<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Radicali Assignment</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
                        <img src="images/logo.png" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

            </div> <!-- header-content -->
        </header> <!-- header -->

    </div> <!-- end s-pageheader -->

	<div id="shortModal" class="modal modal-wide fade">
	<div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Edit</h4>
	  </div>
	  <div class="modal-body">
	    <div class="message form-field">
            <p name="mDesc" id="mDesc" class="full-width" contenteditable="true"></p>
            <span id="sentence_id"></span>
        </div>
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    <button id="save" type="button" class="btn btn-default" data-dismiss="modal">Save changes</button>
	  </div>
	</div>
	</div>
	</div>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow">
        <div class="row">
            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    Rules & Regulations.
                </h1>
            </div> <!-- end s-content__header -->
    
            <div class="col-full s-content__main">
                    <fieldset>
                       <div class="message form-field">
                        <p data-toggle="modal" data-target="#shortModal" id="text0" onclick="editText(this.id);" class="full-width" style="cursor: pointer;"></p>
                        <p data-toggle="modal" data-target="#shortModal" id="text1" onclick="editText(this.id);" class="full-width" style="cursor: pointer;"></p>
                        <p data-toggle="modal" data-target="#shortModal" id="text2" onclick="editText(this.id);" class="full-width" style="cursor: pointer;"></p>
                       </div>
                    </fieldset>
            </div> <!-- end s-content__main -->
        </div> <!-- end row -->
    </section> <!-- s-content -->	

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    
    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/chosen.jquery.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js'></script>
    <script>
        $( document ).ready(function() {
            $.get("http://localhost:5000/backend", function(response)
                {
                    $("#text0").text(response.text0);
                    $("#text1").text(response.text1);
                    $("#text2").text(response.text2);
                });
        });

        function editText(para_id){
            $(".modal-wide").on("show.bs.modal", function() {
                var height = $(window).height() - 200;
                $(this).find(".modal-body").css("max-height", height);
                $("#sentence_id").text(para_id)
                $("#mDesc").html(document.getElementById(para_id).textContent);
            });
        }

        $("#save").click(function(event){
            updatedValue = $('#mDesc').text();
            change = $('#sentence_id').text();
            let message = {
                element: change,
                changes: updatedValue
            }
            $.post("http://localhost:5000/backend", JSON.stringify(message), function(response){
                $("#text0").text(response.text0);
                $("#text1").text(response.text1);
                $("#text2").text(response.text2);
            });
        });
    </script>

</body>