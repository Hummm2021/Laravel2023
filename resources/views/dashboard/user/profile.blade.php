@extends('layouts.apps')
@section('navbar')
<div class="card mb-2">
    <div class="card-body">
        <h2 class="small-title">Contact</h2>
              <div class="card mb-5">
                <div class="card-body">
                  <form>
                    <div class="mb-3 row">
                      <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Primary Email</label>
                      <div class="col-sm-8 col-md-9 col-lg-10">
                        <input type="email" class="form-control" value="me@lisajackson.com" disabled />
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Secondary Email</label>
                      <div class="col-sm-8 col-md-9 col-lg-10">
                        <input type="email" class="form-control" value="lisajackson@gmail.com" />
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Phone</label>
                      <div class="col-sm-8 col-md-9 col-lg-10">
                        <input type="text" class="form-control" value="+6443884455" />
                      </div>
                    </div>
                    <div class="mb-3 row mt-5">
                      <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
    </div>
  </div>
@endsection