@extends('backend.layouts.backend_master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
        <div class="row">
          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <h3>Manual help for users </h3>

                <h5>
                Throughout this document, the instructions below are used to tell how to use this web app.
                </h5>
                <br>
                <h4> Main Pages in Sidebar </h4>
                <p>
                 In the left of window u have Sidebar with main pages with which u will work.
                </p>
                <p>
                Click in the one you want to work, then a new window will be open with its specific data.
                </p>

                <h4> Change Language </h4>
                <p>
                 In the top-left of main window you will see the button which in dropdown menu has two different languages: <br>
                  -English <br>
                  -Albanian
                </p>
                <p>
                Click in the wanted language, then web app will be open translated in choosen language.
                </p>

                <h4> Search</h4>
                <p>
                 In the top-center of side menu part you will see the search where you can search about main pages that are placed in sidebar <br>
                </p>
                <p>
                Click inside it, and search about wanted page.
                </p>
              </div>
            </div>

            
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>

@endsection