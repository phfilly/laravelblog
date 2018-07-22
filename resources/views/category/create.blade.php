@include('structure.top')
  @include('structure.nav') 

  @section('title','Add Category')

  <div class='container'>
    <div class='row'>

      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h2>
              <span class='glyphicon glyphicon-pencil'></span>
              Add Category
          </h2>
        </div>
        <div class='panel-body'>
              @include('structure.errors')

              <form method='POST' action='/categories' enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                  <label>Category</label>
                  <input type='text' class='form-control' value='' placeholder='Add category here' name='name' />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

              </form>
        </div> <!-- end panel-->
      </div><!-- end panel default-->

    </div>
  </div>

@extends('structure.footer')