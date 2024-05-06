<div class="flex flex-row justify-between w-full pt-1 max-w-[1500px] m-auto">
    <div class="flex ltr:justify-start rtl:justify-start">
        <img src="/images/icons/craftfertility (1).webp"
            class="h-16 md:h-28 lg:h-36"alt="craft_logo_image">
    </div>
    <div class="flex ltr:justify-end rtl:justify-end relative">
        <div class="  flex flex-col  top-0  ">
            <div class="z-10 lg:w-full hidden lg:flex ltr:justify-end rtl:justify-end relative">
                <div
                    class="flex ltr:flex-row ltr:justify-end rtl:flex-row-reverse items-center space-x-3 lg:p-3  rtl:justify-start ltr:lg:mr-6 rtl:lg:ml-6 text-[0.4rem]">
                    <div class="flex flex-row  items-center space-x-1 rtl:space-x-reverse ">
                        <img src="/images/icons/Phone.png" class="h-3 rtl:-rotate-90  "alt="">
                        <p class= "lg:text-sm 2xl:text-base font-light font-questrial">+91 8590462565</p>
                    </div>
                    <div class="flex flex-row items-center space-x-1 rtl:space-x-reverse ">
                        <img src="/images/icons/medicine logo.png" class="h-3 2xl:h-5"alt="">
                        <p class="lg:text-sm 2xl:text-base font-light font-questrial">{{__('main_menu.International')}}
                        </p>
                    </div>
                </div>

            </div>
            <div
                class=" items-center z-40  hidden lg:flex ltr:justify-end rtl:justify-start ltr:flex-row rtl:flex-row-reverse relative ltr:lg:-ml-80 rtl:-mr-80 ">
                <div
                    class="flex   ltr:justify-end lg:-ml-4 rtl:justify-start text-sm  lg:mt-4 lg:text-sm lg:pb-3 xl:mr-6 rtl:xl:ml-4 xl:text-base 2xl:text-base  ltr:lg:space-x-5 rtl:space-x-5 ltr:xl:space-x-8 rtl:xl:space-x-8 rtl:space-x-reverse  font-questrial ltr:lg:mr-10 rtl:lg:ml-10 ">
                    <div x-data="{ open: false }" @mouseleave="open = false">
                        <button @mouseover="open = true">
                            <div class="flex flex-row rtl:flex-row-reverse items-center  space-x-1">
                                <div><span class="font-questrial">About us</span></div>
                                <x-easyadmin::display.icon icon="icons.chevron-down-solid" height="h-3" width="w-3" />
                            </div>

                        </button>
                        <div x-show="open" class="absolute  bg-white bg-opacity-90 shadow-xl ">
                            <ul class="flex flex-col p-0">
                                <li class="px-4 py-2 mb-1 hover:font-bold hover:text-pink cursor-pointer text-left"><a
                                        class="font-questrial">About CRAFT</a></li>
                                <li class="px-4 py-2 mb-1 hover:font-bold hover:text-pink cursor-pointer text-left"><a
                                        class="font-questrial">Message from Chairman</a></li>
                                <li class="px-4 py-2 mb-1 hover:font-bold hover:text-pink cursor-pointer text-left"><a
                                        class="font-questrial">International Patients</a></li>
                                <li class="px-4 py-2 mb-1 hover:font-bold hover:text-pink cursor-pointer text-left"><a
                                        class="font-questrial">Our Achievements</a></li>
                            </ul>
                        </div>
                    </div>
                    <div x-data="{ open: false }" @mouseleave="open = false">
                        <button @mouseover="open = true">
                            <div class="flex flex-row rtl:flex-row-reverse items-center space-x-1">
                                <div><span>I’m Looking For</span></div>
                                <x-easyadmin::display.icon icon="icons.chevron-down-solid" height="h-3" width="w-3" />
                            </div>
                        </button>
                        <div x-show="open" class="absolute  bg-white bg-opacity-90 shadow-xl">
                            <ul class="grid grid-cols-3 gap-4 p-4">
                                <li class=" hover:text-pink cursor-pointer"><a class="font-questrial text-center">IVF
                                        Lab and Embriology</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a class="font-questrial text-center">Female
                                        Fertility</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a class="font-questrial text-center">Male
                                        Fertility</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a class="font-questrial text-center">Sperm
                                        and Embrio Freezing</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Medical Genetics</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Reproduction Surgery</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Antenatal Care</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a class="font-questrial text-center">Foetal
                                        Medicine</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Painless Labour</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Neonate and Pediatric care</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Assisting Departments</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Accormation at CRAFT</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial text-center">Medical Insurance</a></li>

                            </ul>
                        </div>
                    </div>
                    <div x-data="{ open: false }" @mouseleave="open = false">
                        <button @mouseover="open = true">
                            <div class="flex flex-row rtl:flex-row-reverse items-center space-x-1">
                                <div><span>Patient Guide</span></div>
                                <x-easyadmin::display.icon icon="icons.chevron-down-solid" height="h-3" width="w-3" />
                            </div>
                        </button>
                        <div x-show="open" class="absolute  bg-white bg-opacity-90 shadow-xl">
                            <ul class="p-2 py-4 space-y-2">
                                <li class=" hover:text-pink cursor-pointer"><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craft-slug'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craft-slug'])}}'})"
                                        class="font-questrial px-4 py-2 mb-1">IVF cycle</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial px-4 py-2 mb-1">Doctor's Video</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial px-4 py-2 mb-1">Patient Video</a></li>
                                <li class=" hover:text-pink cursor-pointer"><a
                                        class="font-questrial px-4 py-2 mb-1">Patient Testimonials</a></li>
                            </ul>


                        </div>
                    </div>

                    <a href="#">
                        <div class="flex flex-row rtl:flex-row-reverse items-center">
                            <div>
                                <p>Training Courses</p>
                            </div>

                        </div>
                    </a><a href="#">Contact Us</a>
                    <a href="#">
                        <div class="flex flex-row rtl:flex-row-reverse items-center">
                            <div>
                                <p>E Book</p>
                            </div>

                        </div>
                    </a>
                    <a href="#">
                        <div class="flex flex-row rtl:flex-row-reverse items-center ">
                            <div>
                                <p>Blogs</p>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- mob-screen -->
        <div class=" w-full  flex flex-col  z-50 lg:hidden text-xl">
            <div x-data="{ open: false }" class="flex ltr:justify-end rtl:justify-end items-center py-6">
                <button @click="open = !open">
                    <svg class=" h-6 w-6  z-10 md:h-6 md:w-6 ltr:mr-2 rtl:ml-2 ltr:sm:ml-4 rtl:sm:mr-4 md:mr-4 lg:hidden "
                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M64.28704 864h416a64 64 0 0 1 4.8 127.84L480.28704 992H64.28704a64 64 0 0 1-4.8-127.84L64.28704 864h416H64.28704z m0-416h832a64 64 0 0 1 4.8 127.84L896.28704 576H64.28704a64 64 0 0 1-4.8-127.84L64.28704 448zM480.28704 48h416a64 64 0 0 1 4.8 127.84L896.28704 176H480.28704a64 64 0 0 1-4.8-127.84L480.28704 48z"
                            fill="#404853" />
                    </svg>
                </button>
                <div x-show="open" class=" fixed  bg-white bg-opacity-90 w-full   h-scren overflow-y-scroll inset-0 z-30  ">
                    <div class=" flex justify-end p-3 sm:p-10 absolute top-5 right-5">
                        <svg xmlns="http://www.w3.org/2000/svg" x-show="open"
                            x-on:click="open = false" class="h-8 w-8 fill-current text-black hover:text-pink"
                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                        </svg>
                    </div>
                    <ul class="relative ltr:space-y-2 rtl:space-y-2 rtl:space-y-reverse mt-28 ltr:pl-6 rtl:pr-6 mx-10 sm:mx-16">
                        <li x-data={open:false} class=" text-black ">
                            <button @click="open = !open"
                                class="font-questrial flex flex-row space-x-1 mt-1  py-1 md:py-1.5  hover:text-pink ">
                                <span class=" ">About us</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3 mt-1.5 fill-current items-center " width="840" height="544"
                                    viewBox="0 0 840 544" version="1.1">
                                    <path
                                        d="M 30.500 40.028 C 27.200 40.378, 40.662 40.739, 60.417 40.832 C 80.171 40.924, 96.146 40.837, 95.917 40.637 C 95.119 39.943, 36.459 39.396, 30.500 40.028 M 292.280 39.736 C 294.909 39.943, 298.959 39.940, 301.280 39.731 C 303.601 39.521, 301.450 39.352, 296.500 39.355 C 291.550 39.358, 289.651 39.530, 292.280 39.736 M 399.328 39.750 C 434.983 39.896, 493.033 39.895, 528.328 39.750 C 563.622 39.604, 534.450 39.485, 463.500 39.485 C 392.550 39.485, 363.672 39.604, 399.328 39.750 M 773.500 40.022 L 743.500 40.544 780 40.709 C 801.669 40.806, 815.618 40.518, 814.329 39.998 C 813.136 39.517, 810.211 39.208, 807.829 39.312 C 805.448 39.415, 790 39.735, 773.500 40.022 M 22 42.994 C 22 43.776, 23.512 46.010, 25.359 47.958 C 27.207 49.906, 31.819 55.355, 35.609 60.066 C 39.399 64.778, 45.200 71.772, 48.500 75.608 C 51.800 79.445, 56.075 84.561, 58 86.977 C 59.925 89.394, 62.400 92.387, 63.500 93.629 C 64.600 94.870, 67.075 97.782, 69 100.099 C 70.925 102.415, 72.956 104.803, 73.514 105.405 C 74.072 106.007, 76.097 108.525, 78.014 111 C 81.173 115.078, 84.333 118.762, 89.250 124.100 C 90.212 125.145, 91 126.450, 91 127 C 91 127.550, 91.338 128.002, 91.750 128.004 C 92.162 128.006, 94.750 130.818, 97.499 134.254 C 100.249 137.689, 103.331 141.400, 104.348 142.500 C 105.365 143.600, 108.269 147.200, 110.802 150.500 C 113.335 153.800, 115.675 156.725, 116.003 157 C 116.330 157.275, 121.673 163.575, 127.876 171 C 134.079 178.425, 140.694 186.238, 142.577 188.361 C 144.460 190.485, 146 192.398, 146 192.611 C 146 192.825, 146.787 193.808, 147.750 194.796 C 148.713 195.783, 151.075 198.568, 153 200.984 C 154.925 203.399, 157.738 206.657, 159.250 208.222 C 160.763 209.788, 162 211.275, 162 211.527 C 162 212.146, 166.084 216.954, 168.250 218.885 C 169.213 219.743, 170 220.794, 170 221.222 C 170 221.650, 170.787 222.820, 171.750 223.822 C 175.600 227.831, 181.290 234.643, 194.448 251 C 198.209 255.675, 201.811 259.950, 202.452 260.500 C 203.505 261.404, 207.489 266.252, 216.373 277.438 C 218.093 279.604, 220.686 282.604, 222.135 284.105 C 223.584 285.606, 225.434 287.781, 226.244 288.938 C 227.055 290.096, 229.249 292.720, 231.120 294.771 C 232.990 296.822, 236.085 300.525, 237.996 303 C 239.907 305.475, 241.928 308.011, 242.486 308.636 C 247.380 314.118, 253.776 321.717, 255 323.506 C 255.825 324.711, 257.320 326.504, 258.321 327.491 C 259.323 328.478, 262.588 332.259, 265.577 335.893 C 276.164 348.763, 289.579 364.789, 295.500 371.641 C 298.800 375.460, 303.075 380.558, 305 382.970 C 312.988 392.981, 320.284 401.521, 321.114 401.833 C 321.601 402.017, 322 402.601, 322 403.131 C 322 403.662, 323.029 405.087, 324.286 406.298 C 325.543 407.509, 328.131 410.524, 330.036 412.997 C 334.660 419, 336.961 421.746, 340.250 425.190 C 341.763 426.773, 343 428.466, 343 428.951 C 343 429.436, 343.399 429.983, 343.886 430.167 C 344.697 430.472, 351.144 438.001, 360 448.985 C 361.925 451.372, 365.125 455.165, 367.110 457.413 C 369.096 459.661, 372.888 464.200, 375.538 467.500 C 378.187 470.800, 380.614 473.725, 380.930 474 C 381.246 474.275, 384.203 477.864, 387.502 481.975 C 395.612 492.083, 397.247 494.071, 399 495.954 C 399.825 496.841, 401.694 499.152, 403.153 501.089 C 409.915 510.068, 416.741 517.592, 417.468 516.865 C 417.813 516.520, 404.004 499.421, 386.780 478.869 C 369.557 458.316, 343.972 427.775, 329.926 411 C 291.288 364.856, 77.857 108.684, 49.570 74.500 C 20.615 39.510, 22 41.092, 22 42.994 M 801.500 61.216 C 780.336 86.860, 521.520 397.454, 487.112 438.500 C 471.437 457.200, 450.682 481.950, 440.992 493.500 C 431.302 505.050, 423.026 515.175, 422.602 516 C 421.426 518.288, 433.919 505.051, 437.232 500.500 C 438.833 498.300, 441.574 494.923, 443.322 492.995 C 445.070 491.068, 449.200 486.135, 452.500 482.032 C 455.800 477.930, 459.175 473.877, 460 473.025 C 460.825 472.173, 463.298 469.232, 465.496 466.488 C 467.694 463.745, 470.192 460.825, 471.048 460 C 471.904 459.175, 475.255 455.125, 478.496 451 C 481.737 446.875, 484.976 443.140, 485.694 442.700 C 486.412 442.260, 487 441.248, 487 440.450 C 487 439.653, 487.447 439, 487.994 439 C 488.540 439, 490.331 437.145, 491.973 434.879 C 494.660 431.170, 497.957 427.197, 507.585 416.066 C 514.760 407.771, 536.699 381.306, 538.245 379.081 C 539.169 377.750, 541.658 374.825, 543.775 372.581 C 545.893 370.336, 549.557 366.025, 551.917 363 C 554.278 359.975, 558.700 354.669, 561.743 351.209 C 564.786 347.750, 568.211 343.700, 569.353 342.209 C 570.496 340.719, 571.691 339.275, 572.008 339 C 572.529 338.548, 582.840 326.410, 586.874 321.500 C 587.777 320.400, 591.888 315.513, 596.008 310.640 C 600.129 305.767, 603.950 301.104, 604.500 300.277 C 605.050 299.450, 606.625 297.537, 608 296.026 C 609.375 294.516, 611.722 291.754, 613.215 289.890 C 614.709 288.025, 617.422 284.700, 619.244 282.500 C 621.066 280.300, 624.252 276.374, 626.325 273.775 C 628.397 271.176, 630.860 268.290, 631.797 267.362 C 632.733 266.434, 635.975 262.643, 639 258.937 C 642.025 255.230, 647.987 248.139, 652.250 243.179 C 656.513 238.219, 660 233.917, 660 233.620 C 660 233.324, 661.797 231.248, 663.993 229.007 C 666.189 226.766, 669.865 222.390, 672.162 219.281 C 674.458 216.172, 677.666 212.250, 679.291 210.564 C 680.915 208.879, 685.663 203.225, 689.841 198 C 698.407 187.289, 712.500 170.221, 717.007 165.099 C 718.653 163.228, 720 161.316, 720 160.849 C 720 160.382, 720.337 159.998, 720.750 159.996 C 721.163 159.994, 723.750 157.188, 726.500 153.759 C 729.250 150.331, 732.228 146.620, 733.118 145.513 C 734.007 144.406, 740.310 136.975, 747.123 129 C 753.936 121.025, 761.758 111.629, 764.505 108.119 C 767.252 104.610, 772.200 98.592, 775.500 94.745 C 778.800 90.899, 782.754 86.121, 784.286 84.126 C 787.287 80.219, 796.410 69.802, 801.869 64.050 C 803.722 62.098, 806.397 58.925, 807.812 57 C 809.228 55.075, 811.396 52.375, 812.630 51 C 814.466 48.954, 817.550 42.945, 816.725 43.021 C 816.601 43.032, 809.750 51.220, 801.500 61.216"
                                        stroke="none" fill="#414141" fill-rule="evenodd" />
                                    <path
                                        d="M 59.750 40.750 C 39.538 40.901, 23 41.376, 23 41.805 C 23 42.729, 20.697 39.951, 176.930 227.500 C 363.666 451.667, 418.843 517.500, 419.989 517.500 C 421.197 517.500, 489.778 435.656, 683.944 202.500 C 813.929 46.412, 817 42.707, 817 41.957 C 817 40.536, 691.133 40.015, 402 40.238 C 233.975 40.368, 79.963 40.598, 59.750 40.750"
                                        stroke="none" fill=current fill-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" class=" bg-white h-fit w-full inset-0 top-0"
                                x-on:click.outside="open = false">

                                <ul class="flex flex-col ltr:ml-2 rtl:mr-2 p-2 py-4 space-y-2">
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center  ">About CRAFT</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center  ">Message from Chairman</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center  ">International Patients</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center  ">Our Achievements</a></li>
                                </ul>
                            </div>
                        </li>
                        <li x-data={open:false} class=" text-black">
                            <button @click="open = !open"
                                class="font-questrial flex flex-row mt-2 space-x-1  py-1 md:py-2  hover:text-pink ">
                                <span>I’m Looking For</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3 mt-1.5 fill-current items-center" width="840" height="544"
                                    viewBox="0 0 840 544" version="1.1">
                                    <path
                                        d="M 30.500 40.028 C 27.200 40.378, 40.662 40.739, 60.417 40.832 C 80.171 40.924, 96.146 40.837, 95.917 40.637 C 95.119 39.943, 36.459 39.396, 30.500 40.028 M 292.280 39.736 C 294.909 39.943, 298.959 39.940, 301.280 39.731 C 303.601 39.521, 301.450 39.352, 296.500 39.355 C 291.550 39.358, 289.651 39.530, 292.280 39.736 M 399.328 39.750 C 434.983 39.896, 493.033 39.895, 528.328 39.750 C 563.622 39.604, 534.450 39.485, 463.500 39.485 C 392.550 39.485, 363.672 39.604, 399.328 39.750 M 773.500 40.022 L 743.500 40.544 780 40.709 C 801.669 40.806, 815.618 40.518, 814.329 39.998 C 813.136 39.517, 810.211 39.208, 807.829 39.312 C 805.448 39.415, 790 39.735, 773.500 40.022 M 22 42.994 C 22 43.776, 23.512 46.010, 25.359 47.958 C 27.207 49.906, 31.819 55.355, 35.609 60.066 C 39.399 64.778, 45.200 71.772, 48.500 75.608 C 51.800 79.445, 56.075 84.561, 58 86.977 C 59.925 89.394, 62.400 92.387, 63.500 93.629 C 64.600 94.870, 67.075 97.782, 69 100.099 C 70.925 102.415, 72.956 104.803, 73.514 105.405 C 74.072 106.007, 76.097 108.525, 78.014 111 C 81.173 115.078, 84.333 118.762, 89.250 124.100 C 90.212 125.145, 91 126.450, 91 127 C 91 127.550, 91.338 128.002, 91.750 128.004 C 92.162 128.006, 94.750 130.818, 97.499 134.254 C 100.249 137.689, 103.331 141.400, 104.348 142.500 C 105.365 143.600, 108.269 147.200, 110.802 150.500 C 113.335 153.800, 115.675 156.725, 116.003 157 C 116.330 157.275, 121.673 163.575, 127.876 171 C 134.079 178.425, 140.694 186.238, 142.577 188.361 C 144.460 190.485, 146 192.398, 146 192.611 C 146 192.825, 146.787 193.808, 147.750 194.796 C 148.713 195.783, 151.075 198.568, 153 200.984 C 154.925 203.399, 157.738 206.657, 159.250 208.222 C 160.763 209.788, 162 211.275, 162 211.527 C 162 212.146, 166.084 216.954, 168.250 218.885 C 169.213 219.743, 170 220.794, 170 221.222 C 170 221.650, 170.787 222.820, 171.750 223.822 C 175.600 227.831, 181.290 234.643, 194.448 251 C 198.209 255.675, 201.811 259.950, 202.452 260.500 C 203.505 261.404, 207.489 266.252, 216.373 277.438 C 218.093 279.604, 220.686 282.604, 222.135 284.105 C 223.584 285.606, 225.434 287.781, 226.244 288.938 C 227.055 290.096, 229.249 292.720, 231.120 294.771 C 232.990 296.822, 236.085 300.525, 237.996 303 C 239.907 305.475, 241.928 308.011, 242.486 308.636 C 247.380 314.118, 253.776 321.717, 255 323.506 C 255.825 324.711, 257.320 326.504, 258.321 327.491 C 259.323 328.478, 262.588 332.259, 265.577 335.893 C 276.164 348.763, 289.579 364.789, 295.500 371.641 C 298.800 375.460, 303.075 380.558, 305 382.970 C 312.988 392.981, 320.284 401.521, 321.114 401.833 C 321.601 402.017, 322 402.601, 322 403.131 C 322 403.662, 323.029 405.087, 324.286 406.298 C 325.543 407.509, 328.131 410.524, 330.036 412.997 C 334.660 419, 336.961 421.746, 340.250 425.190 C 341.763 426.773, 343 428.466, 343 428.951 C 343 429.436, 343.399 429.983, 343.886 430.167 C 344.697 430.472, 351.144 438.001, 360 448.985 C 361.925 451.372, 365.125 455.165, 367.110 457.413 C 369.096 459.661, 372.888 464.200, 375.538 467.500 C 378.187 470.800, 380.614 473.725, 380.930 474 C 381.246 474.275, 384.203 477.864, 387.502 481.975 C 395.612 492.083, 397.247 494.071, 399 495.954 C 399.825 496.841, 401.694 499.152, 403.153 501.089 C 409.915 510.068, 416.741 517.592, 417.468 516.865 C 417.813 516.520, 404.004 499.421, 386.780 478.869 C 369.557 458.316, 343.972 427.775, 329.926 411 C 291.288 364.856, 77.857 108.684, 49.570 74.500 C 20.615 39.510, 22 41.092, 22 42.994 M 801.500 61.216 C 780.336 86.860, 521.520 397.454, 487.112 438.500 C 471.437 457.200, 450.682 481.950, 440.992 493.500 C 431.302 505.050, 423.026 515.175, 422.602 516 C 421.426 518.288, 433.919 505.051, 437.232 500.500 C 438.833 498.300, 441.574 494.923, 443.322 492.995 C 445.070 491.068, 449.200 486.135, 452.500 482.032 C 455.800 477.930, 459.175 473.877, 460 473.025 C 460.825 472.173, 463.298 469.232, 465.496 466.488 C 467.694 463.745, 470.192 460.825, 471.048 460 C 471.904 459.175, 475.255 455.125, 478.496 451 C 481.737 446.875, 484.976 443.140, 485.694 442.700 C 486.412 442.260, 487 441.248, 487 440.450 C 487 439.653, 487.447 439, 487.994 439 C 488.540 439, 490.331 437.145, 491.973 434.879 C 494.660 431.170, 497.957 427.197, 507.585 416.066 C 514.760 407.771, 536.699 381.306, 538.245 379.081 C 539.169 377.750, 541.658 374.825, 543.775 372.581 C 545.893 370.336, 549.557 366.025, 551.917 363 C 554.278 359.975, 558.700 354.669, 561.743 351.209 C 564.786 347.750, 568.211 343.700, 569.353 342.209 C 570.496 340.719, 571.691 339.275, 572.008 339 C 572.529 338.548, 582.840 326.410, 586.874 321.500 C 587.777 320.400, 591.888 315.513, 596.008 310.640 C 600.129 305.767, 603.950 301.104, 604.500 300.277 C 605.050 299.450, 606.625 297.537, 608 296.026 C 609.375 294.516, 611.722 291.754, 613.215 289.890 C 614.709 288.025, 617.422 284.700, 619.244 282.500 C 621.066 280.300, 624.252 276.374, 626.325 273.775 C 628.397 271.176, 630.860 268.290, 631.797 267.362 C 632.733 266.434, 635.975 262.643, 639 258.937 C 642.025 255.230, 647.987 248.139, 652.250 243.179 C 656.513 238.219, 660 233.917, 660 233.620 C 660 233.324, 661.797 231.248, 663.993 229.007 C 666.189 226.766, 669.865 222.390, 672.162 219.281 C 674.458 216.172, 677.666 212.250, 679.291 210.564 C 680.915 208.879, 685.663 203.225, 689.841 198 C 698.407 187.289, 712.500 170.221, 717.007 165.099 C 718.653 163.228, 720 161.316, 720 160.849 C 720 160.382, 720.337 159.998, 720.750 159.996 C 721.163 159.994, 723.750 157.188, 726.500 153.759 C 729.250 150.331, 732.228 146.620, 733.118 145.513 C 734.007 144.406, 740.310 136.975, 747.123 129 C 753.936 121.025, 761.758 111.629, 764.505 108.119 C 767.252 104.610, 772.200 98.592, 775.500 94.745 C 778.800 90.899, 782.754 86.121, 784.286 84.126 C 787.287 80.219, 796.410 69.802, 801.869 64.050 C 803.722 62.098, 806.397 58.925, 807.812 57 C 809.228 55.075, 811.396 52.375, 812.630 51 C 814.466 48.954, 817.550 42.945, 816.725 43.021 C 816.601 43.032, 809.750 51.220, 801.500 61.216"
                                        stroke="none" fill="#414141" fill-rule="evenodd" />
                                    <path
                                        d="M 59.750 40.750 C 39.538 40.901, 23 41.376, 23 41.805 C 23 42.729, 20.697 39.951, 176.930 227.500 C 363.666 451.667, 418.843 517.500, 419.989 517.500 C 421.197 517.500, 489.778 435.656, 683.944 202.500 C 813.929 46.412, 817 42.707, 817 41.957 C 817 40.536, 691.133 40.015, 402 40.238 C 233.975 40.368, 79.963 40.598, 59.750 40.750"
                                        stroke="none" fill=current fill-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" class=" bg-white h-fit w-full inset-0 top-0  "
                                x-on:click.outside="open = false">

                                <ul class="ltr:ml-4 rtl:mr-4 space-y-2 ">
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">IVF Lab and Embriology</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Female Fertility</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Male Fertility</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Sperm and Embrio Freezing</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Medical Genetics</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Reproduction Surgery</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Antenatal Care</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Foetal Medicine</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Painless Labour</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Neonate and Pediatric care</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Assisting Departments</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center">Accormation at CRAFT</a></li>
                                    <li class=" hover:text-pink cursor-pointer "><a
                                            class="font-questrial text-center">Medical Insurance</a></li>

                                </ul>
                            </div>
                        </li>
                        <li x-data={open:false} class=" text-black  ">
                            <button @click="open = !open"
                                class="font-questrial flex flex-row mt-2 space-x-1  py-1 md:py-2  hover:text-pink">
                                <p>Patient Guide</p>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3 mt-1.5 fill-current text-black items-center" width="840"
                                    height="544" viewBox="0 0 840 544" version="1.1">
                                    <path
                                        d="M 30.500 40.028 C 27.200 40.378, 40.662 40.739, 60.417 40.832 C 80.171 40.924, 96.146 40.837, 95.917 40.637 C 95.119 39.943, 36.459 39.396, 30.500 40.028 M 292.280 39.736 C 294.909 39.943, 298.959 39.940, 301.280 39.731 C 303.601 39.521, 301.450 39.352, 296.500 39.355 C 291.550 39.358, 289.651 39.530, 292.280 39.736 M 399.328 39.750 C 434.983 39.896, 493.033 39.895, 528.328 39.750 C 563.622 39.604, 534.450 39.485, 463.500 39.485 C 392.550 39.485, 363.672 39.604, 399.328 39.750 M 773.500 40.022 L 743.500 40.544 780 40.709 C 801.669 40.806, 815.618 40.518, 814.329 39.998 C 813.136 39.517, 810.211 39.208, 807.829 39.312 C 805.448 39.415, 790 39.735, 773.500 40.022 M 22 42.994 C 22 43.776, 23.512 46.010, 25.359 47.958 C 27.207 49.906, 31.819 55.355, 35.609 60.066 C 39.399 64.778, 45.200 71.772, 48.500 75.608 C 51.800 79.445, 56.075 84.561, 58 86.977 C 59.925 89.394, 62.400 92.387, 63.500 93.629 C 64.600 94.870, 67.075 97.782, 69 100.099 C 70.925 102.415, 72.956 104.803, 73.514 105.405 C 74.072 106.007, 76.097 108.525, 78.014 111 C 81.173 115.078, 84.333 118.762, 89.250 124.100 C 90.212 125.145, 91 126.450, 91 127 C 91 127.550, 91.338 128.002, 91.750 128.004 C 92.162 128.006, 94.750 130.818, 97.499 134.254 C 100.249 137.689, 103.331 141.400, 104.348 142.500 C 105.365 143.600, 108.269 147.200, 110.802 150.500 C 113.335 153.800, 115.675 156.725, 116.003 157 C 116.330 157.275, 121.673 163.575, 127.876 171 C 134.079 178.425, 140.694 186.238, 142.577 188.361 C 144.460 190.485, 146 192.398, 146 192.611 C 146 192.825, 146.787 193.808, 147.750 194.796 C 148.713 195.783, 151.075 198.568, 153 200.984 C 154.925 203.399, 157.738 206.657, 159.250 208.222 C 160.763 209.788, 162 211.275, 162 211.527 C 162 212.146, 166.084 216.954, 168.250 218.885 C 169.213 219.743, 170 220.794, 170 221.222 C 170 221.650, 170.787 222.820, 171.750 223.822 C 175.600 227.831, 181.290 234.643, 194.448 251 C 198.209 255.675, 201.811 259.950, 202.452 260.500 C 203.505 261.404, 207.489 266.252, 216.373 277.438 C 218.093 279.604, 220.686 282.604, 222.135 284.105 C 223.584 285.606, 225.434 287.781, 226.244 288.938 C 227.055 290.096, 229.249 292.720, 231.120 294.771 C 232.990 296.822, 236.085 300.525, 237.996 303 C 239.907 305.475, 241.928 308.011, 242.486 308.636 C 247.380 314.118, 253.776 321.717, 255 323.506 C 255.825 324.711, 257.320 326.504, 258.321 327.491 C 259.323 328.478, 262.588 332.259, 265.577 335.893 C 276.164 348.763, 289.579 364.789, 295.500 371.641 C 298.800 375.460, 303.075 380.558, 305 382.970 C 312.988 392.981, 320.284 401.521, 321.114 401.833 C 321.601 402.017, 322 402.601, 322 403.131 C 322 403.662, 323.029 405.087, 324.286 406.298 C 325.543 407.509, 328.131 410.524, 330.036 412.997 C 334.660 419, 336.961 421.746, 340.250 425.190 C 341.763 426.773, 343 428.466, 343 428.951 C 343 429.436, 343.399 429.983, 343.886 430.167 C 344.697 430.472, 351.144 438.001, 360 448.985 C 361.925 451.372, 365.125 455.165, 367.110 457.413 C 369.096 459.661, 372.888 464.200, 375.538 467.500 C 378.187 470.800, 380.614 473.725, 380.930 474 C 381.246 474.275, 384.203 477.864, 387.502 481.975 C 395.612 492.083, 397.247 494.071, 399 495.954 C 399.825 496.841, 401.694 499.152, 403.153 501.089 C 409.915 510.068, 416.741 517.592, 417.468 516.865 C 417.813 516.520, 404.004 499.421, 386.780 478.869 C 369.557 458.316, 343.972 427.775, 329.926 411 C 291.288 364.856, 77.857 108.684, 49.570 74.500 C 20.615 39.510, 22 41.092, 22 42.994 M 801.500 61.216 C 780.336 86.860, 521.520 397.454, 487.112 438.500 C 471.437 457.200, 450.682 481.950, 440.992 493.500 C 431.302 505.050, 423.026 515.175, 422.602 516 C 421.426 518.288, 433.919 505.051, 437.232 500.500 C 438.833 498.300, 441.574 494.923, 443.322 492.995 C 445.070 491.068, 449.200 486.135, 452.500 482.032 C 455.800 477.930, 459.175 473.877, 460 473.025 C 460.825 472.173, 463.298 469.232, 465.496 466.488 C 467.694 463.745, 470.192 460.825, 471.048 460 C 471.904 459.175, 475.255 455.125, 478.496 451 C 481.737 446.875, 484.976 443.140, 485.694 442.700 C 486.412 442.260, 487 441.248, 487 440.450 C 487 439.653, 487.447 439, 487.994 439 C 488.540 439, 490.331 437.145, 491.973 434.879 C 494.660 431.170, 497.957 427.197, 507.585 416.066 C 514.760 407.771, 536.699 381.306, 538.245 379.081 C 539.169 377.750, 541.658 374.825, 543.775 372.581 C 545.893 370.336, 549.557 366.025, 551.917 363 C 554.278 359.975, 558.700 354.669, 561.743 351.209 C 564.786 347.750, 568.211 343.700, 569.353 342.209 C 570.496 340.719, 571.691 339.275, 572.008 339 C 572.529 338.548, 582.840 326.410, 586.874 321.500 C 587.777 320.400, 591.888 315.513, 596.008 310.640 C 600.129 305.767, 603.950 301.104, 604.500 300.277 C 605.050 299.450, 606.625 297.537, 608 296.026 C 609.375 294.516, 611.722 291.754, 613.215 289.890 C 614.709 288.025, 617.422 284.700, 619.244 282.500 C 621.066 280.300, 624.252 276.374, 626.325 273.775 C 628.397 271.176, 630.860 268.290, 631.797 267.362 C 632.733 266.434, 635.975 262.643, 639 258.937 C 642.025 255.230, 647.987 248.139, 652.250 243.179 C 656.513 238.219, 660 233.917, 660 233.620 C 660 233.324, 661.797 231.248, 663.993 229.007 C 666.189 226.766, 669.865 222.390, 672.162 219.281 C 674.458 216.172, 677.666 212.250, 679.291 210.564 C 680.915 208.879, 685.663 203.225, 689.841 198 C 698.407 187.289, 712.500 170.221, 717.007 165.099 C 718.653 163.228, 720 161.316, 720 160.849 C 720 160.382, 720.337 159.998, 720.750 159.996 C 721.163 159.994, 723.750 157.188, 726.500 153.759 C 729.250 150.331, 732.228 146.620, 733.118 145.513 C 734.007 144.406, 740.310 136.975, 747.123 129 C 753.936 121.025, 761.758 111.629, 764.505 108.119 C 767.252 104.610, 772.200 98.592, 775.500 94.745 C 778.800 90.899, 782.754 86.121, 784.286 84.126 C 787.287 80.219, 796.410 69.802, 801.869 64.050 C 803.722 62.098, 806.397 58.925, 807.812 57 C 809.228 55.075, 811.396 52.375, 812.630 51 C 814.466 48.954, 817.550 42.945, 816.725 43.021 C 816.601 43.032, 809.750 51.220, 801.500 61.216"
                                        stroke="none" fill="#414141" fill-rule="evenodd" />
                                    <path
                                        d="M 59.750 40.750 C 39.538 40.901, 23 41.376, 23 41.805 C 23 42.729, 20.697 39.951, 176.930 227.500 C 363.666 451.667, 418.843 517.500, 419.989 517.500 C 421.197 517.500, 489.778 435.656, 683.944 202.500 C 813.929 46.412, 817 42.707, 817 41.957 C 817 40.536, 691.133 40.015, 402 40.238 C 233.975 40.368, 79.963 40.598, 59.750 40.750"
                                        stroke="none" fill=current fill-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" class=" bg-white h-fit w-full inset-0 top-0 "
                                x-on:click.outside="open = false">

                                <ul class="ltr:ml-4 rtl:mr-4 space-y-2">
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center ">IVF cycle</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center ">Doctor's Video</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center ">Patient Video</a></li>
                                    <li class=" hover:text-pink cursor-pointer"><a
                                            class="font-questrial text-center ">Patient Testimonials</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class=" text-black  hover:text-pink"><a href="#"
                                class="font-questrial  py-1 md:py-2">Training Courses</a></li>
                        <li class=" text-black  hover:text-pink"><a href="#"
                                class="font-questrial  py-1 md:py-2">Contact Us</a></li>
                        <li class=" text-black  hover:text-pink"><a href="#"
                                class="font-questrial  py-1 md:py-2">E Book</a></li>
                        <li class=" text-black  hover:text-pink pb-4"><a href="#"
                                class="font-questrial  py-1 md:py-2">Blogs</a></li>
                    </ul>

                </div>
            </div>
        </div>

    </div>


</div>
