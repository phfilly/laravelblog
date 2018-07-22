@include('structure.top')
  @include('structure.nav') 

  @section('title','Create Post')

  <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <h2>
                <span class='glyphicon glyphicon-pencil'></span>
                CREATE A POST
            </h2>
          </div>
          <div class='panel-body'>
                @include('structure.errors')

                <form method='POST' action='/post' enctype="multipart/form-data">

                  {{ csrf_field() }}

                  <div class="form-group">
                    <label>Title</label>
                    <input type='text' class='form-control' value='' placeholder='Title' name='title' />
                  </div>

                  <div class="form-group">
                    <label>Body</label>
                    <textarea class="form-control" id="body" rows="3" name='body'></textarea>
                  </div>

                  <div class="form-group">
                    <label>Category</label>

                    <select class="form-control" name="category">
                        <option>Choose a category for you post</option>
                      @foreach($category as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option> 
                      @endforeach   
                    </select>

                  </div>

                   <div class="form-group">
                    <label>Article Cover Picture</label>
                    <input type='file' name='image'/>
                  </div>

                  <div class="form-group">
                    <label>Article Status</label>
                    <br>

                      <label class="btn btn-success">
                          <input type="radio" name="status"  autocomplete="off" value='Active' checked> Active
                      </label>
                      <label class="btn btn-danger">
                        <input type="radio" name="status" autocomplete="off" value='Disable'> Disable
                      </label>
                  
                  </div>

                  <hr>
                 
                  <button type="submit" class="btn btn-primary">Submit</button>

                </form>
          </div> <!-- end panel-->
        </div><!-- end panel default-->
      </div>

    </div>
  </div>

@extends('structure.footer')