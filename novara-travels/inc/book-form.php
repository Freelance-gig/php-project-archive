<form class="d-flex flex-column flex-md-row gap-4 align-items-center" method="POST">
    <div class="d-flex flex-column">
    <span> From </span>
        <select name="origin" id="from-select" <?php if(!isset($_SESSION['isAuthenticated'])){echo "disabled";} ?> >
        <option value="">Choose Origin </option>
        <option value="london">London</option>
        <option value="canada">canada</option>
        <option value="usa">usa</option>
        <option value="germany">germany</option>
        </select>
    </div>
    <div class="d-flex flex-column">
    <span> To </span>
        <select name="destination" id="from-select"  <?php if(!isset($_SESSION['isAuthenticated'])){echo "disabled";}?>>
        <option value="">Choose destination</option>
        <option value="london">London</option>
        <option value="canada">canada</option>
        <option value="usa">usa</option>
        <option value="germany">germany</option>
        </select>
    </div>
    <div>
    <span> Depature </span>
    <input type="date"class="form-control" placeholder="Date" name="depature_date" required  <?php if(!isset($_SESSION['isAuthenticated'])){echo "disabled";}?>>
    </div>
    <div>
    <span> Return </span>
    <input type="date"class="form-control" placeholder="Date" name="arrival_date" required  <?php if(!isset($_SESSION['isAuthenticated'])){echo "disabled";} ?>>
    </div>
    <!-- <button type="submit" class="button"> Book Ticket </button> -->
    <?php 
        if(isset($_SESSION['isAuthenticated'])) {
           echo <<<HTML
            <button type="button" class="btn btn-primary book-ticket" data-bs-toggle="modal" data-bs-target="#passengerInfoModal">
                Book Ticket
            </button>
            HTML;
        } else {
            echo <<<HTML
                <div>
                    <p> Manage your booking easily and securely </p>
                <a href="login.php" class="btn btn-secondary"> Login </a>
                </div>
                HTML;
        }
    ?>

    <div class='modal' id="passengerInfoModal" tabindex='-1'>
    <div class='modal-dialog'>
    <?php  
        if(isset($_SESSION['isAuthenticated'])) {
            echo <<<HTML
                <div class='modal-content'>
                <div class='modal-header'>
                <h5 class='modal-title'>Enter Passenger Details </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>      
                    <div class="d-flex flex-column"> 
                        <span> First Name </span>
                        <input type="text" name="firstname" required/>
                    </div>
                    <div class="d-flex flex-column"> 
                        <span> Last Name </span>
                        <input type="text" name="lastname" required />
                    </div>
                    <div class="d-flex flex-column"> 
                        <span> Date of Birth </span>
                        <input type="date" class="form-control" placeholder="Date" name="dob" required>
                    </div>
                    <div class="d-flex flex-column"> 
                        <span> Nationality </span>
                        <select name="nationality" id="from-select" required>
                            <option value="">Choose Nationality</option>
                            <option value="nigerian">Nigerian</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column"> 
                        <fieldset>
                        <legend>Choose a Ticket type </legend>
                            <div>
                                <input type="radio" id="ONE-WAY" name="booking_type" value="ONE-WAY" checked required/>
                                <label for="ONE-WAY">One-way Ticket </label>
                            </div>

                            <div>
                                <input type="radio" id="RETURN" name="booking_type" value="RETURN" required/>
                                <label for="RETURN"> Return Ticket </label>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                <button type='submit' name="book" class='btn btn-primary'>Save Ticket Details</button>
                </div>
                </div>
                HTML;

        };
    ?>

    </div>
</div>
</form>
       
