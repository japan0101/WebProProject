<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tailwind.php") ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/loginModal.php") ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/regisModal.php") ?>

</head>

<body>
<div class="w-full bg-gray py-2 mx-1">
    <p class="text-4xl font-bold">Current order: <?php
        $value ?></p>
</div>
<div class="flex flex-row snap-x scroll-smooth overflow-x-auto relative">
    <div class="h-full w-1/4 border bg-gray m-1 px-1 scroll-ml-6 flex-none">
        <p class="text-2xl">Order Number: </p>
        <p class="text-2xl">from table: </p>
        <p class="text-2xl">Order list:</p>
        <hr>
        <div class="flex flex-col place-content-center px-3">
            <p class="text-xl">1 x meat ball</p>
            <p class="text-xl">1 x lazanya</p>
        </div>
        <hr>
        <div class="flex w-fit m-auto p-1">
            <button class="w-fit m-auto text-xl flex bg-green-400 rounded-md">
                <svg fill="#000000" width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" id="check-mark-square-2"
                     data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line place-self-center"
                     transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <polyline id="primary" points="21 5 12 14 8 10"
                                  style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                        <path id="primary-2" data-name="primary"
                              d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16"
                              style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                    </g>
                </svg>
                <p class="text-center"> Done</p>
            </button>
        </div>
    </div>
    <?php

    ?>


</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tw_element.php") ?>
</body>

</html>