@include('structure.top')
  @include('structure.nav') 

  <div class='container'>
    <div class='row'>

      @include('structure.errors')

      <form method='POST' action='/post'>

        {{ csrf_field() }}

        <div class="form-group">
          <label>Title</label>
          <input type='text' class='form-control' value='' placeholder='Title' name='title' />
        </div>

        <div class="form-group">
          <label>Body</label>
          <textarea class="form-control" id="exampleTextarea" rows="3" name='body'></textarea>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>

@include('structure.footer')