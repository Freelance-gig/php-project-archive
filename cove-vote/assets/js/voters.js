$(document).ready(function() {
    getAllVoters();
    searchVoters();
    getAllOfficers();
})
function getUrlParameter(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function getAllVoters (){
    const searchQuery = getUrlParameter('search_q')
    if (searchQuery) {
        $.ajax({
            url: "./server/voters.php",
            method: "POST",
            data: {
                input: searchQuery,
            },
            success: function (response) {
                if (!(response == 'No record')) {
                    $.each(response, function(key, value) {
                        $(".table_body").append (`
                        <tr>
                            <th scope="row">1</th>
                            <td> ${value['firstname']} </td>
                            <td> ${value['lastname']} </td>
                            <td>23</td>
                        </tr>`)
                    })
                } else {
                    $(".table_body").append (` No Record  `)
                }
            }
        })
    } else {
        $.ajax({
            type: "GET",
            url: './server/voters.php',
            data: {
                get_voter: 1
            },
            success: function (response)  {
                if (!(response == 'No record')) {
                    $.each(response, function(key, value) {
                        $(".table_body").append (`
                        <tr>
                            <th scope="row">1</th>
                            <td> ${value['firstname']} </td>
                            <td> ${value['lastname']} </td>
                            <td>3</td>
                        </tr>`)
                    })
                    $('.voter_no').append(`${response.length}`)
                } else {
                    $('.voter_no').append('0')
                    $(".table_body").append (` No Record  `)
                }
             
            }
        })
    }
}


function getAllOfficers (){
    $.ajax({
        type: "GET",
        url: './server/voters.php',
        data: {
            get_officers: 1
        },
        success: function (response)  {
            if (!(response == 'No record')) {
                $.each(response, function(key, value) {
                    $(".table_officer_body").append (`
                    <tr>
                        <th scope="row">1</th>
                        <td> ${value['firstname']} </td>
                        <td> ${value['lastname']} </td>
                        <td>3</td>
                    </tr>`)
                })
                $('.officer_no').append(`${response.length}`)

            } else {
                $(".table_body").append (` No Record  `)
                $('.officer_no').append(`0`)

            }
         
        }
    })
}
function searchVoters () {
    $("#search-button").click(function ( ) {
      var inputValue = $("#search").val();
      if (inputValue !== "") {
          window.location.href= `./voters-list.php?search_q=${inputValue}`
      }
    })
  }