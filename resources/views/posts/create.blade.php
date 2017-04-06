@extends('structure.top')
  @include('structure.nav') 

  @section('title','Create Post')

  <div class='container'>
    <div class='row'>

      @extends('structure.errors')

      <form method='POST' action='/post'>

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
          <label>Article Status</label>
          <br>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-success">
                <input type="radio" name="status"  autocomplete="off" value='Active' checked> Active
            </label>
            <label class="btn btn-danger">
              <input type="radio" name="status" autocomplete="off" value='Disable'> Disable
            </label>
          </div>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>

@extends('structure.footer')