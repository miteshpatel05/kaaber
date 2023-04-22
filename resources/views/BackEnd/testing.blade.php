@extends('BackEnd.Layout.main')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Quiz</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('theme').'/index.html'}}">Home</a></li>
          <li class="breadcrumb-item active">AddQuiz</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div style="display: none;" id="output" class="alert alert-success"></div>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Quiz Form</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" id="my-form">
                @csrf
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Subject Name</label>
                  <input type="text" class="form-control" id="SubjectName" name="SubjectName" >
                </div>
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Subject Detail</label>
                  <textarea class="form-control" id="SubjectDetail" name="SubjectDetail" ></textarea>
                </div>
                <div class="col-3">
                  <label for="inputAddress5" class="form-label">Quiz Time (in Seconds)</label>
                  <input type="number" class="form-control" id="QuizTime" name="quiztime" >
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="btnsubmit">Submit</button>

                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

  </main><!-- End #main -->

  <script>


$(document).ready(function(){

      $('#my-form').submit(function(event){

        // for stop refreshing page
        event.preventDefault();

        var form = $("#my-form")[0];
        var data = new FormData(form);

        // for disable submit button
        var x = $("#my-form").serializeArray();
                $.each(x, function(i, field) {

                    alert(field.name + ":"
                            + field.value + " ");
                });


      });
  });
    </script>
@endsection
