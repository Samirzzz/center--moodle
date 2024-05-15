<?php 
 session_start();
include_once '..\includes\db.php';

 require_once '../app/Model/User.php';
 require_once '../app/Model/Student.php';





 if (!empty($_SESSION['ID'])) {
     $UserObject = new user($_SESSION["ID"]);

 }
 ?>


<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    </head>

<style>
    .header-links li span {
      position: relative;
      z-index: 0;
    }   
  
    .header-links li span::before {
      content: '';
      position: absolute;
      z-index: -1;
      bottom: 2px;
      left: -4px;
      right: -4px;
      display: block;
      height: 6px;
    }
  
    .header-links li.active span::before {
      background-color: #fcae04;
    }
  .active{
    background-color: #fcae04;

  }
    .header-links li:not(.active):hover span::before {
      background-color: #ccc;
    }
    .logo {
    font-size: 24px;
    font-weight: bold; 
    color: #333; 
}
  </style>
  
<body>
    

 
      <header class="bg-white shadow-lg h-24 hidden md:flex">
        <a href="" class="border flex-shrink-0 flex items-center justify-center px-4 lg:px-6 xl:px-8">
            <span class="logo">Manaseti</span>
        </a>
        <nav class=" contents font-semibold text-base lg:text-lg">
         <ul class="flex items-center ml-4 xl:ml-8 mr-auto">
    <?php
    for ($i = 0; $i < count($UserObject->usertype->pages); $i++) {
        echo '
        <li class="p-3 xl:p-6">
            <a class="' . $UserObject->usertype->pages[$i]->class . '" href="' . $UserObject->usertype->pages[$i]->linkaddress . '">
                <span class="icon">' . $UserObject->usertype->pages[$i]->icons . '</span>
                <span>' . $UserObject->usertype->pages[$i]->name . '</span>
            </a>
        </li>
        ';
    }
    ?>
</ul>

        </nav>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse justify-start "> 
    <button type="button" style="margin-right: 50px;" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
    <img src="../public/images/profile.jpg"width="50" height="50"  >
    </button>
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php  echo $_SESSION["email"] ?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
            </li>
            
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</a>
            </li>
        </ul>
    </div>
    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
</div>

       
      </header>
</body>
  
</html>