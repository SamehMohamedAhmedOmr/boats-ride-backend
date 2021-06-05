
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
<div class="container">
     <div class="row justify-content-center">
         <div class="col-12">
             @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{session('success')}}
              </div>
              @endif

            @error('credential')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            @error('token')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            @if(!$tokenValid)
                <div class="alert alert-danger" role="alert">
                    This Link Has Been Expired
                </div>
            @endif
        

         </div>


        <div class="col-12" style="padding-top: 10px; padding-bottom: 10px;">

            <div class="d-flex justify-content-center">
                <img style="max-width: 300px;" class="card-img-top" src="{{asset('/images/logo.jpeg')}}" alt="Card image cap">    
              </div>
        </div>
        
         <div class="col-md-8">
            @if(session()->has('success'))
            <div class="d-flex justify-content-center" style="margin-top: 95px">
            <div class="col-md-4">
                <a href="{{ $web_url }}" class="btn btn-primary">
                    continue 
                </a>
            </div>
            </div>
            @else
            @if($tokenValid)
            <div class="card">
                <div class="card-header">Reset Password</div>
                     <div class="card-body">
                         <form method="POST" action="/reset-password">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                      
   
                       <div class="form-group row">
                           <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                               @error('password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>

                       </div>

                     <div class="form-group row">
                           <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                           <div class="col-md-6">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                           </div>
                       </div>

                    <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                               <button type="submit" class="btn btn-primary">
                                   Reset Password
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
            </div>
            @endif
          @endif
           
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

