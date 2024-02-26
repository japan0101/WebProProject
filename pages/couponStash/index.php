<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LeawTaeApp</title>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tailwind.php") ?>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/asset/script/sweetalert.js"></script>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/nav.php") ?>
    <?php if (isset($_SESSION['userID'])) { ?>
        <span class="my-5">
            <div class="rounded-lg border dark:border-neutral-600">
                <div class="p-4">
                    <div class="sm:flex sm:items-start">
                        <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto pl-0" id="bannerSel" role="tablist" data-te-nav-ref="">
                            <!-- Selector -->
                            <li role="presentation" class="flex-grow text-center">
                                <a href="#allCoupon" 
                                class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" 
                                data-te-toggle="pill" 
                                data-te-target="#allCoupon" 
                                data-te-nav-active role="tab" 
                                aria-controls="allCoupon" 
                                aria-selected="true">All</a>
                            </li>
                        </ul>
                        <!-- Coupon Container -->
                        <div class="my-2 grow" id="contentHolder">
                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="allCoupon" role="tab" aria-labelledby="allCoupon" data-te-tab-active="">
                                <div class="flex flex-wrap justify-center items-center max-w-[110rem]" id="allCouponContainer">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </span>

    <?php } else { ?>

        <script>
            Warning.fire({
                icon: "warning",
                title: "คำเตือน",
                text: "คุณยังไม่ได้เข้าสู่ระบบ"
            });
        </script>
    <?php } ?>
    <script>
        fetch("/backend/database/customer.php?case=mycoupon").then(e => e.json()).then(payload => {
            selectorContainer = document.getElementById('bannerSel');
            contentContainer = document.getElementById('contentHolder');
            allContainer = document.getElementById('allCouponContainer');
            console.log(payload);
            category = []
            payload.forEach(couponObj => {
                if(!category.includes(couponObj.category)){
                    //Rendering tabs for each new category
                    category.push(couponObj['category']);
                    selList = document.createElement('li');
                    selList.setAttribute('role', 'presentation');
                    selList.className = 'flex-grow text-center'

                    selector = document.createElement('a');
                    selector.className = "my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    selector.setAttribute('href', 'tab-' + couponObj['categoryID']);
                    selector.setAttribute('data-te-toggle', 'pill');
                    selector.setAttribute('data-te-target', '#' + 'tab-' + couponObj['categoryID']);
                    selector.setAttribute('role', 'tab');
                    selector.setAttribute('aria-controls', 'tab-' + couponObj['categoryID']);
                    selector.setAttribute('aria-selected', 'false');
                    selector.innerHTML = couponObj['category'];
                    selList.appendChild(selector);
                    selectorContainer.appendChild(selList);

                    contentBody = document.createElement('div');
                    contentBody.className = "hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block";
                    contentBody.id = 'tab-' + couponObj['categoryID'];
                    contentBody.setAttribute('role', 'tabpanel');
                    contentBody.setAttribute('aria-labelledby', 'tab-' + couponObj['categoryID']);

                    couponHolder = document.createElement('div');
                    couponHolder.className = "flex flex-wrap justify-center items-center max-w-[110rem]"
                    couponHolder.id = 'tab-' + couponObj['categoryID'] + '-holder';
                    contentBody.appendChild(couponHolder);
                    contentContainer.appendChild(contentBody);
                }
                //Redering coupon card
                currentHolder = document.getElementById('tab-' + couponObj['categoryID'] + '-holder');

                card = document.createElement('div');
                card.className = "my-3 mx-1 block max-w-[19rem] rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"
                

                imageSection = document.createElement('div')
                imageSection.className = "relative overflow-hidden bg-cover bg-no-repeat"
                imageSection.setAttribute('data-te-ripple-init', '');
                imageSection.setAttribute('data-te-ripple-color', 'light');

                imagePart = document.createElement('img');
                imagePart.className = "rounded-t-lg"
                imagePart.setAttribute('src', 'https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg')
                imagePart.setAttribute('alt', 'picture_of_' + couponObj['menuName'])

                imageFunction = document.createElement('a');
                imageFunction.setAttribute('href', '#!');
                imageFunctionIn = document.createElement('div');
                imageFunctionIn.className = "absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100";
                
                info = document.createElement('div');
                info.className = 'p-6'
                
                title = document.createElement('h5');
                title.className = "mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50"
                title.innerHTML = couponObj['menuName']
                
                des = document.createElement('p');
                des.className = "mb-4 text-base text-neutral-600 dark:text-neutral-200"
                des.innerHTML = "คูปองส่วนลด " + couponObj['discount'] * 100 + " %"

                button = document.createElement("button");
                button.setAttribute('type', 'button');
                button.className = "inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                button.setAttribute('data-te-ripple-init', '');
                button.setAttribute('data-te-ripple-color', 'light');
                button.setAttribute('onclick', 'showCode(\'' + couponObj['expire'] + '\', \'' + couponObj['couponCode'] + '\')');
                button.innerHTML = "แสดงรหัสคูปอง"

                imageSection.appendChild(imagePart);
                imageSection.appendChild(imageFunction);
                imageFunction.appendChild(imageFunctionIn);
                card.appendChild(imageSection);
                info.appendChild(title);
                info.appendChild(des);
                info.appendChild(button);
                card.appendChild(info);
                allContainer.appendChild(card.cloneNode(true));
                currentHolder.appendChild(card);
            });
        });
        function showCode(expire, code){
            Code.fire({
                title: "<div class='font-bold text-xl text-center'>รหัสส่วนลดของคุณ<div>",
                html: "<div class='border border-sky-500 text-center'>" + code + "</div>"
            });
        }
    </script>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tw_element.php") ?>

</body>

</html>
