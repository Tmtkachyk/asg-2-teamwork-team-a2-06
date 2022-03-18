<!-- navbar -->
<div class="md:block sm:hidden w-10/12 m-auto">
  <nav class="flex bg-white rounded-3xl">
    <div class="px-6 py-6 flex w-full ">
      <img class="h-12" src="../images/teamLogo.png" alt="logo">
      <!-- Nav Links -->
      <ul class="px-4 mx-auto font-semibold font-heading space-x-12 ">
        <li class="bg-black/80 text-white"><a href="index.php">Home</a></li>
        <li class="bg-black/80 text-white"><a href="login.php">Login</a></li>
        <li class="bg-black/80 text-white"><a href="about.php">About Us</a></li>
      </ul>
    </div>

  </nav>
</div>
<!-- Responsive Header -->
<div class="md:hidden sm:block w-10/12 m-auto bg-white rounded-3xl py-1">

  <nav class="flex items-center justify-between flex-wrap px-6 py-2">

    <img class="h-12" src="../images/teamLogo.png" alt="logo">
    <button class="navbar-burger flex items-center px-3 py-2 mr-5 border rounded text-black  border-black hover:text-black hover:border-black">
      <!-- <img src="../images/burgerIcon.png" alt=""> -->
      <svg class="fill-current h-6 w-6 text-black-700" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
      </svg>
    </button>

    <div id="main-nav" class="w-full flex-grow lg:flex items-center lg:w-auto hidden  ">
      <div class="text-sm lg:flex-grow mt-2 animated jackinthebox xl:mx-8 float-right">
        <a href="index.php" class="block lg:inline-block text-md font-bold  text-black  sm:hover:border-indigo-400  hover:text-orange-500 mx-2 focus:text-blue-500  p-1 hover:bg-gray-300 sm:hover:bg-transparent rounded-lg">
          Home
        </a>
        <a href="login.php" class="block lg:inline-block text-md font-bold  text-black  sm:hover:border-indigo-400  hover:text-orange-500 mx-2 focus:text-blue-500  p-1 hover:bg-gray-300 sm:hover:bg-transparent rounded-lg">
          Login
        </a>
        <a href="about.php" class="block lg:inline-block text-md font-bold  text-black  sm:hover:border-indigo-400  hover:text-orange-500 mx-2 focus:text-blue-500  p-1 hover:bg-gray-300 sm:hover:bg-transparent rounded-lg">
          About Us
        </a>
      </div>
    </div>

  </nav>




  <script>
    // Navbar Toggle
    document.addEventListener('DOMContentLoaded', function() {
      // Get all "navbar-burger" elements
      let $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
      // Check if there are any navbar burgers
      if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(function($el) {
          $el.addEventListener('click', function() {

            // Get the "main-nav" element
            let $target = document.getElementById('main-nav');

            // Toggle the class on "main-nav"
            $target.classList.toggle('hidden');

          });
        });
      }

    });
  </script>

</div>

<!-- source: https://tailwindcomponents.com/component/navbar-hamburger-menu-for-ecommerce -->
<!-- https://tailwindcomponents.com/component/navigation-4 -->
