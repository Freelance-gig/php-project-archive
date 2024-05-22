<i class="fa-solid fa-bars btn-menu"></i>
<nav class="menu bg-white">
    <i class="fa-solid mg-2 fa-xmark btn-close"></i>
    <a class="logo ff-jua " href="./index.php">
        <span class="text-dark"> The African Cuisine </span> 
        <span class="text-secondary">(IBILE)</span>
    </a>
    <div class="flex navbar">
        <ul class="flex nav text-dark">
            <!-- <li><a class="link" id="about" href="./">Blog</a></li> -->
            <li><a class="link" id="program" href="about.php">About</a></li>
            <li><a class="link" id="join" href="contact-us.php">Contact Us</a></li>
            <?php 
            if (isset($_SESSION['loggedIn']))  {
                echo '<li><a class="link" id="join" href="dashboard.php">Dashboard</a></li>';
            }
            ?>
        </ul>
        <div class="flex gap">
        <?php 
            if (isset($_SESSION['userType'])) {
                if ($_SESSION['userType'] == 'cook' || $_SESSION['userType'] == 'admin') {
                    echo '<a href="./add-new.php"><button class="btn btn-add flex gap"> <img class="btn-icon" src="./assets/imgs/add-icon.png" />  Add New </button> </a>';
                }; 
            }
         
            if (isset($_SESSION['loggedIn']))  {
                echo ' <a href="./server/auth/logout.php"> <button class="btn" type="button"> Log Out <button> </a> ';
            } else {
                echo ' <a href="./auth.php"><button class="btn" type="button"> Sign up / Login  </button> </a>' ;
            };
        ?>
         </div>
    </div>
</nav>
<!-- <div class="modalBox">
        <form class="add-recipe-form">
            <div class="name">
                <label> Food Name</label>
                <input id="name" placeholder="Food Name" required class="input" />
            </div>
            <div class="decription">
                <label> Description </label>
                <textarea id="description" placeholder="Some Description about the food"> </textarea>
            </div>
            <select name="category" id="location">
                <option value="soups">Soups </option>
                <option value="morsel">Morsels </option>
                <option value="grain">Grains</option>
                <option value="meats">Meat</option>
                <option value="beverages">Beverages</option>
                <option value="snacks">Snacks</option>
            </select>
            <select name="location" id="location">
                <option value="east">East Africa </option>
                <option value="south">South Africa</option>
                <option value="west">West Africa</option>
                <option value="north">North Africa</option>
            </select>
            <div class="flex nutritents">
                <div>
                    <label> Vitamins</label>
                    <input type="number" class="nutrients" max="1000" />
                </div>
                <div>
                    <label> Proteins </label>
                    <input type="number" class="nutrients" max="1000" />
                </div>
                <div>
                    <label> Water </label>
                    <input type="number" class="nutrients" max="1000" />
                </div>
                <div>
                    <label> Fats </label>
                    <input type="number" class="nutrients" max="1000" />
                </div>
            </div>
            <div>
                <label for="ingridients"> Ingridients </label>
                <textarea id="ingridients"> </textarea> 
            </div>
            
            <div>
            
            </div>
            <label for="instructions"> Instructions </label>
            <textarea id="instructions"> </textarea>
            <button type="button" id="add-recipe" class="btn mg-2"> Submit </button>
        </form>
</div> -->