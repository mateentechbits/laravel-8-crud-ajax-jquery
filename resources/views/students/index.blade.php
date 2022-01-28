<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine-ie11.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="bg-slate-300">
    {{-- Header --}}

    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5  dark:bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="#" class="flex">
                <svg class="mr-3 h-10" viewBox="0 0 52 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.87695 53H28.7791C41.5357 53 51.877 42.7025 51.877 30H24.9748C12.2182 30 1.87695 40.2975 1.87695 53Z"
                        fill="#76A9FA"></path>
                    <path
                        d="M0.000409561 32.1646L0.000409561 66.4111C12.8618 66.4111 23.2881 55.9849 23.2881 43.1235L23.2881 8.87689C10.9966 8.98066 1.39567 19.5573 0.000409561 32.1646Z"
                        fill="#A4CAFE"></path>
                    <path
                        d="M50.877 5H23.9748C11.2182 5 0.876953 15.2975 0.876953 28H27.7791C40.5357 28 50.877 17.7025 50.877 5Z"
                        fill="#1C64F2"></path>
                </svg>
                <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">Techbits</span>
            </a>
            <button data-collapse-toggle="mobile-menu" id="mobile-menu-icon" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="#"
                            class="block text-2xl py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/insert') }}"
                            class="block text-2xl py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Insert</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- /Header --}}
    
    {{-- insert Form --}}

    <div class="mt-10 bg-white w-7/12 pb-4 mx-auto rounded-md overflow-hidden">
        <h1 class="text-center text-2xl mb-8 text-blue-800 font-bold tracking-wide">Add Student</h1>
        <form id="student-form">
            @csrf
            <div class="flex justify-center">
                <label for="name" class="text-xl p-1">Name</label>
                <input type="text" name="stdName" id="stdName"
                    class="border-2 transition duration-500 mr-1 placeholder-red-400 focus:placeholder-transparent border-red-400 w-3/12 py-2 text-center text-black bg-transparent rounded-md focus:outline-none ">
                {{-- ----------------------------- Addres ------------------- --}}
                <label for="address" class="text-xl p-1">Address</label>
                <input type="text" name="stdAddres" id="stdAddres"
                    class="border-2 transition duration-500 mr-1 placeholder-red-400 focus:placeholder-transparent border-red-400 w-3/12 py-2 text-center text-black bg-transparent rounded-md focus:outline-none ">
                <button class="btn bg-blue-700 hover:bg-blue-800 text-white tracking-normal font-bold p-1 rounded-md"
                    type="button" id="save-std">Add Student</button>
            </div>
        </form>
        {{-- Errors --}}
        <div id="errors-container"
            class="hidden text-center mx-auto rounded-md w-60 p-1 mt-2 dark:bg-gray-800 text-white mb-3">
            <p id="errors" class='text-yellow-400 text-left p-1'></p>
        </div>
        {{-- success --}}
        <div id="success-container"
            class="hidden text-center mx-auto rounded-md w-60 p-1 mt-2 dark:bg-gray-800 text-white mb-3">
            <p id="success" class='text-yellow-400 text-left p-1'></p>
        </div>

    </div>
    {{-- Ajax crud content --}}
    <div class="container mb-24">
        <div class="max-w-md mx-auto mt-5">
            <div>
                <div class="container mt-6 flex justify-center mx-auto">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <div class="border-b border-gray-200 rounded overflow-hidden shadow mb-3">
                                <h1 class="text-3xl text-center mb-3 text-blue-900 font-bold">Laravel Ajax Student
                                    Records</h1>
                                <table id="table" class="">
                                    <thead class="bg-gray-500">
                                        <tr>
                                            <th class="px-6 py-2 text-xs text-white">
                                                ID
                                            </th>
                                            <th class="px-6 py-2 text-xs text-white">
                                                Student Name
                                            </th>
                                            <th class="px-6 py-2 text-xs text-white">
                                                Student Address
                                            </th>
                                            <th class="px-6 py-2 text-xs text-white">
                                                Edit
                                            </th>
                                            <th class="px-6 py-2 text-xs text-white">
                                                Delete
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody" class="bg-white">
                                        {{-- <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                1
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">
                                                    Mateen
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-500">Chitral</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="#"
                                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            {{-- {{ $data->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- /Ajax crud content --}}

    <footer class="dark:bg-gray-800 text-white h-10 fixed bottom-0 w-full">
        <p class="text-center text-2xl">
            First Crud Application In Laravel 8
        </p>
    </footer>




    {{-- /Simple crud content --}}

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    {{-- /jquery --}}
    <script>
        $(document).ready(function() {
            ////////////////////////////////////Show data///////////////////////////////
            fetchData();

            function fetchData() {
                $.ajax({
                    type: "GET",
                    url: "/show-std",
                    dataType: "json",
                    success: function(response) {
                        //    console.log('response',response);
                        $("#tbody").html('');
                        $.each(response.data, function(keys, values) {

                            $("#tbody").append("<tr class='whitespace-nowrap'>\
                                                <td class='px-6 py-4 text-sm text-gray-500'>" + values.id + "</td>\
                                                <td class='px-6 py-4'>\
                                                    <div class='text-sm text-gray-900'> " + values.stdName + " </div>\
                                                </td>\
                                                <td class='px-6 py-4'>\
                            <div class='text-sm text-gray-500'>" + values.stdAddres +
                                "</div>\
                                                </td>\
                                                <td class='px-6 py-4'>\
        <button  type='button' data-token='{{ csrf_token() }}'  class='editBtn bg-red-500 text-white rounded px-3 py-1'  data-id='"+values.id+"'>Edit</button>\
                                                </td>\
                                                <td class='px-6 py-4'>\
          <button type='button'  data-token='{{ csrf_token() }}' class='deleteBtn bg-red-500 text-white rounded p-1' data-id='"+values.id+"'>Delete</button>\
                                                </td>\
                                            \</tr>"
                            );
                        });

                    }
                });
            }
            ///////////////////////////////////// delete data /////////////////////
            $(document).on('click', '.deleteBtn', function(e) { 
                e.preventDefault();
                var id=$(this).attr("data-id");
                // console.log(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/deleteStd/"+id,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 404) {
                        $('#errors-container').show();
                        $("#errors").html('');
                        $('#errors').text(response.message);
                    } else {
                        $('#success-container').show();
                        $('#success').html('');
                        $('#success').text(response.message);
                        setTimeout(function() {
                                $("#success-container").fadeOut('fast');
                            }, 3000);
                        fetchData();
                    }
                        
                    }
                });
                


                

            });
            // Insert data/////////////////////

            $("#save-std").click(function(e) {
                e.preventDefault();
                var stdName = $("#stdName").val();
                var stdAddres = $("#stdAddres").val();

                var data = {
                    'stdName': stdName,
                    'stdAddres': stdAddres
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/save",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $("#errors-container").show();
                            $('#errors').html('');
                            $.each(response.errors, function(key, values) {
                                values.forEach(element => {
                                    $("#errors").append(element + "<br>");
                                });
                            });


                        } else {
                            $("#success-container").show();
                            $("#success").html('');
                            $("#success").text(response.success);
                            $("#student-form").find('input').val('');
                            setTimeout(function() {
                                $("#success-container").fadeOut('fast');
                            }, 3000);
                            fetchData();
                        }
                    }
                });


            });

           // mobile menu
            $("#mobile-menu-icon").click(function() {
                $("#mobile-menu").show();
            });



        });
    </script>
</body>

</html>
