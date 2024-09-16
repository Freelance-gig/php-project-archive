$(document).ready(function() {
    $("#add-election-btn").on('click', function() {
        let name = $("#name").val();
        let description = $("#description").val();
        let candidates_arr = $("#candidates").val().split(',');
        let location = $("#location").val();
        let polling_unit = $("#polling_unit").val();
        let candidates_obj = []
        for (var i = 0; i < candidates_arr.length; ++i) {
            candidates_obj.push({
                name: candidates_arr[i],
                votes: 0
            })
        }
        var candidates  = JSON.stringify(candidates_obj)
        $.ajax({
            url: './server/election.php',
            method: 'POST',
            data: {
                add_election: 1,
                name: name,
                description: description,
                candidates: candidates,
                location: location,
                polling_unit: polling_unit
            },
            success: function(response) {
                if (response == 'success') {
                    window.location.href = 'election-list.php';
                } else {
                    alert(response)
                }
            },
            dataType: 'text'
        })

    })
    getAllElections();
})

function getUrlParameter(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function getAllElections () {
    const searchQuery = getUrlParameter('search_q')
    const locationParam = getUrlParameter('location')
    const polling_unit = getUrlParameter('polling_unit')

    if (locationParam && polling_unit) {
        $.ajax({
            url: "./server/election.php",
            method: "POST",
            data: {
                location: locationParam,
                polling_unit: polling_unit,
                formQuery: 1
            },
            success: function (response) {
                if (!(response == 'No record')) {
                    $.each(response, function(key, value) {
                        $(".election-wrapper").append (`
                            <div class="election">
                                <div class="flex">
                                <img src="./assets/imgs/vote-icon.png" />
                                <span> <span> ${value['votes'] ?value['votes']: '0'}  </span> Voters</span>
                                </div>
                                <span> ${
                                    value['polling_unit'] == 'polling_unit_A'? 'Polling Unit A' : value['polling_unit'] == 'polling_unit_B' ? 'Poling Unit B' : value['polling_unit'] == 'polling_unit_C' ? 'Polling Unit C' : 'No Polling Unit'
                                
                                } </span>
                                <h3> ${value['name']} </h3>
                                <a href="./election-detail.php?election_id=${value['election_id']} "><button class="btn btn-secondary"> View More </button> </a>
                            </div>
        `
                        )
                    })
                } else {
                    $(".election-wrapper").append (` No Record  `)
                }
             
            }
        })
    }
    if (searchQuery) {
        $.ajax({
            url: "./server/election.php",
            method: "POST",
            data: {
                input: searchQuery,
                searchQuery: 1
            },
            success: function (response) {
                if (!(response == 'No record')) {
                    $.each(response, function(key, value) {
                        $(".election-wrapper").append (`
                            <div class="election">
                                <div class="flex">
                                <img src="./assets/imgs/vote-icon.png" />
                                <span> <span> ${value['votes'] ?value['votes']: '0'}  </span> Voters</span>
                                </div>
                                <span> ${
                                    value['polling_unit'] == 'polling_unit_A'? 'Polling Unit A' : value['polling_unit'] == 'polling_unit_B' ? 'Poling Unit B' : value['polling_unit'] == 'polling_unit_C' ? 'Polling Unit C' : 'No Polling Unit'
                                
                                } </span>
                                <h3> ${value['name']} </h3>
                                <a href="./election-detail.php?election_id=${value['election_id']} "><button class="btn btn-secondary"> View More </button> </a>
                            </div>
        `
                        )
                    })
                } else {
                    $(".election-wrapper").append (` No Record  `)
                }
             
            }
        })
    }
    
    if (!locationParam && !polling_unit && !searchQuery){
        $.ajax({
            type: "GET",
            url: './server/election.php',
            data: {
                get_election: 1
            },
            success: function (response)  {
                if (! (response == 'No record')) {
                    if ($(location).attr("pathname") == '/index.php') {
                        $.each(response.slice(0, 3), function(key, value) {
                            $(".election-wrapper").append (`
                                <div class="election">
                                    <div class="flex">
                                    <img src="./assets/imgs/vote-icon.png" />
                                    <span> <span> ${value['votes'] ?value['votes']: '0'}  </span> Voters</span>
                                    </div>
                                    <span> ${
                                        value['polling_unit'] == 'polling_unit_A'? 'Polling Unit A' : value['polling_unit'] == 'polling_unit_B' ? 'Poling Unit B' : value['polling_unit'] == 'polling_unit_C' ? 'Polling Unit C' : 'No Polling Unit'
                                    
                                    } </span>
                                    <h3> ${value['name']} </h3>
                                    <a href="./election-detail.php?election_id=${value['election_id']} "><button class="btn btn-secondary"> View More </button> </a>
                                </div>
            `
                            )
                        })
            
                    } else {
                        $.each(response, function(key, value) {
                            $(".election-wrapper").append (`
                                <div class="election">
                                    <div class="flex">
                                    <img src="./assets/imgs/vote-icon.png" />
                                    <span> <span> ${value['votes'] ?value['votes']: '0'}  </span> Voters</span>
                                    </div>
                                    <span> ${
                                        value['polling_unit'] == 'polling_unit_A'? 'Polling Unit A' : value['polling_unit'] == 'polling_unit_B' ? 'Poling Unit B' : value['polling_unit'] == 'polling_unit_C' ? 'Polling Unit C' : 'No Polling Unit'
                                    
                                    } </span>
                                    <h3> ${value['name']} </h3>
                                    <a href="./election-detail.php?election_id=${value['election_id']} "><button class="btn btn-secondary"> View More </button> </a>
                                </div>
            `
                            )
                        })
                    }
            }   else {
                $(".election-wrapper").append (` No Record  `)

            }
            }
        })
    }
  
}