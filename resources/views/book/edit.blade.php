@extends('include.index')


@section('content')
    <div class="container border border-emerald-500 p-5">
        <label for="inputPassword" class="col-sm-2 col-form-label">create title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" name="title">
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label">create author</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" name="author">
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label">create edition</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" name="edition">
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label">create publishing</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" name="publishing">
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label">create isbn</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" name="isbn">
        </div>
        <select class="form-select mt-3" aria-label="Default select example" name="category_id">
            <option selected>Open this select menu</option>
            
                <option value=""></option>
            
        </select>
        <select class="form-select mt-3" aria-label="Default select example" name="place_id">
            <option selected>Open this select menu</option>

            <option value=""></option>

        </select>

        <label for="inputPassword" class="col-sm-2 col-form-label">create image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputPassword" name="image">
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label">create pdf</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputPassword" name="pdf">
        </div>
    </div>
@endsection
