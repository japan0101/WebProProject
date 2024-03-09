<?php
                              session_start();
                              if (isset($_SESSION['role'])) {
                                                            if ($_SESSION['role'] != "MANAGER")
                                                                                          header("Location: ./../../");
                              } else header("Location: ./../../");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./../../assets/icon/favicon.svg">

    <title>Laew Tae App</title>
                              
                              <?php
                                                            include("./../../assets/scripts/tailwind.php") ?>

    <link rel="stylesheet" href="./../../assets/stylesheets/navbar.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/global.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/developers.css">
</head>

<body class="bg-gray-200">

<?php
                              include("./../../assets/component/navManager.php") ?>

<main>
    <div data-te-animation-init data-te-animation-start="onLoad" data-te-animation-reset="true"
         data-te-animation="[fade-in-down_1s_ease-out]"
         class="relative mb-16 flex items-center justify-center bg-gray-50 py-16 sm:py-24 lg:py-32">
        <div class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 dark:from-neutral-700 dark:to-neutral-800"
             aria-hidden="true"></div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl text-center text-lg">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl">
                    <span class="mb-6 block text-6xl">ร้านอาหารแล้วแต่แอปหลังบ้าน</span>
                    <span class="block text-3xl">ยินดีต้อนรับ</span>
                </h1>
                                          
                                          <?php
                                                                        if (!isset($_SESSION['memberName'])) { ?>
                                                                            <p class="mb-6 mt-6 max-w-3xl text-xl text-teal-50">
                                                                                สะสมแต้ม แลกส่วนลดด้วยแต้ม
                                                                                ลุ้นรับส่วนลดพิเศษ
                                                                            </p>
                                                                            <button type="button"
                                                                                    class="inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                                                    data-te-ripple-init
                                                                                    data-te-toggle="modal"
                                                                                    data-te-target="#regisModal">
                                                                                สมัครสมาชิก
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="inline-block rounded-full border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                                                                    data-te-ripple-init
                                                                                    data-te-toggle="modal"
                                                                                    data-te-target="#loginModal">
                                                                                เข้าสู่ระบบ
                                                                            </button>
                                                                                                      <?php
                                                                        } else { ?>
                                                                            <p class="mt-6 max-w-3xl text-xl text-teal-50">
                        <span class="block text-3xl"><?php
                                                                                    echo $_SESSION['memberName'] ?></span>
                                                                            </p>

                                                                            <p class="mt-6 max-w-3xl text-xl text-teal-50">
                                                                                <span class="block text-3xl">สามารถเพิ่มเมนู จัดการเมนู จัดการผู้ใช้ จัดการโต๊ะได้</span>
                                                                            </p>
                                                                                                      <?php
                                                                        } ?>
            </div>
        </div>
    </div>
</main>


<section class="body_container">
    <section id="developers">
        <h1 class="headline text-center">Developers</h1>
        <div id="mark" class="dev-box mt-6 flex flex-row-re container_rounded bg-white justify-center">
            <div class="flex flex-col" style="width: 100%">
                <h3 class="blue-text">65070005 - Mr.Kanokpol Poykham</h3>
                <h1 class="mt-3">Mark</h1>
                <p class="">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                    nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                    perferendis quasi repellat!
                </p>
                <div class="flex flex-row gap-3 justify-between mt-5">
                    <div id="mark-facebook" class="flex flex-col social-media-small-box facebook text-white">
                        <img src="./../../assets/icon/facebook.svg" alt="Facebook">
                        <h5 class="text-white">Facebook</h5>
                    </div>
                    <div id="mark-dis" class="flex flex-col social-media-small-box discord">
                        <img src="./../../assets/icon/discord.svg" alt="Discord">
                        <h5 class="text-white">Discord</h5>
                    </div>
                    <div id="mark-git" class="flex flex-col social-media-small-box github">
                        <img src="./../../assets/icon/github.svg" alt="Github">
                        <h5 class="">GitHub</h5>
                    </div>
                    <div id="mark-none" class="flex flex-col social-media-small-box">
                        <img alt="" src="./../../assets/icon/microsoft-edge.webp">
                        <h5>Something else...</h5>
                    </div>
                </div>
            </div>
            <div class="object-contain flex flex-col self-center" style="width: 90%;">
                <img alt="" src="./../../assets/images/developers/mark.webp" width="">
            </div>
        </div>
        <div id="best" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
            <div class="flex flex-col" style="width: 100%">
                <h3 class="blue-text">65070028 - Mr.Kanisorn Somsriagsornsang</h3>
                <h1 class="mt-3">Best</h1>
                <p class="">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                    nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                    perferendis quasi repellat!
                </p>
                <div class="flex flex-row gap-3 justify-between mt-5">
                    <div id="best-facebook" class="flex flex-col social-media-small-box facebook text-white">
                        <img src="./../../assets/icon/facebook.svg" alt="Facebook">
                        <h5 class="text-white">Facebook</h5>
                    </div>
                    <div id="best-dis" class="flex flex-col social-media-small-box discord">
                        <img src="./../../assets/icon/discord.svg" alt="Discord">
                        <h5 class="text-white">Discord</h5>
                    </div>
                    <div id="best-git" class="flex flex-col social-media-small-box github">
                        <img src="./../../assets/icon/github.svg" alt="Github">
                        <h5 class="">GitHub</h5>
                    </div>
                    <div id="best-none" class="flex flex-col social-media-small-box">
                        <img alt="" src="./../../assets/icon/microsoft-edge.webp">
                        <h5>Something else...</h5>
                    </div>
                </div>
            </div>
            <div class="object-contain flex flex-col self-center" style="width: 90%;">
                <img alt="" src="./../../assets/images/developers/best.webp" width="">
            </div>
        </div>
        <div id="japan" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
            <div class="flex flex-col" style="width: 100%">
                <h3 class="blue-text">65070064 - Mr.Napat Wetchapun</h3>
                <h1 class="mt-3">Japan</h1>
                <p class="">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                    nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                    perferendis quasi repellat!
                </p>
                <div class="flex flex-row gap-3 justify-between mt-5">
                    <div id="japan-facebook" class="flex flex-col social-media-small-box facebook text-white">
                        <img src="./../../assets/icon/facebook.svg" alt="Facebook">
                        <h5 class="text-white">Facebook</h5>
                    </div>
                    <div id="japan-dis" class="flex flex-col social-media-small-box discord">
                        <img src="./../../assets/icon/discord.svg" alt="Discord">
                        <h5 class="text-white">Discord</h5>
                    </div>
                    <div id="japan-git" class="flex flex-col social-media-small-box github">
                        <img src="./../../assets/icon/github.svg" alt="Github">
                        <h5 class="">GitHub</h5>
                    </div>
                    <div id="japan-none" class="flex flex-col social-media-small-box">
                        <img alt="" src="./../../assets/icon/microsoft-edge.webp">
                        <h5>Something else...</h5>
                    </div>
                </div>
            </div>
            <div class="object-contain flex flex-col self-center" style="width: 90%;">
                <img alt="" src="./../../assets/images/developers/Japan.webp" width="">
            </div>
        </div>
        <div id="tae" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
            <div class="flex flex-col" style="width: 100%">
                <h3 class="blue-text">65070089 - Mr.Tanakrit Supprasit</h3>
                <h1 class="mt-3">Tae</h1>
                <p class="">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                    nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                    perferendis quasi repellat!
                </p>
                <div class="flex flex-row gap-3 justify-between mt-5">
                    <div id="tae-facebook" class="flex flex-col social-media-small-box facebook text-white">
                        <img src="./../../assets/icon/facebook.svg" alt="Facebook">
                        <h5 class="text-white">Facebook</h5>
                    </div>
                    <div id="tae-dis" class="flex flex-col social-media-small-box discord">
                        <img src="./../../assets/icon/discord.svg" alt="Discord">
                        <h5 class="text-white">Discord</h5>
                    </div>
                    <div id="tae-git" class="flex flex-col social-media-small-box github">
                        <img src="./../../assets/icon/github.svg" alt="Github">
                        <h5 class="">GitHub</h5>
                    </div>
                    <div id="tae-none" class="flex flex-col social-media-small-box">
                        <img alt="" src="./../../assets/icon/microsoft-edge.webp">
                        <h5>Something else...</h5>
                    </div>
                </div>
            </div>
            <div class="object-contain flex flex-col self-center" style="width: 90%;">
                <img alt="" src="./../../assets/images/developers/tae_prepro.webp" width="">
            </div>
        </div>
        <script src="./../../assets/scripts/developer.js"></script>
    </section>
</section>

<?php
                              include("./../../assets/scripts/tw_element.php") ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./../../assets/scripts/sweetalert.js"></script>

</body>

</html>