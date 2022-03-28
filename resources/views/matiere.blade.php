@extends('home')
 @section('title','Ma classe')
 @section('content')
     @if ($layout == 'indexMatiere')
        <div class="container-fluid">
            <div class="">
                @include("listeMatieres")
           </div>
       </div>             
    @elseif ($layout == 'createMatiere')  
         <div class="container-fluid mt-4 ">
              <div class="row">
                  <section class="col-md-7">
                  	 @include('listeMatieres')
                  </section>
                   <section class="col-md-5"> 
                       <div class="card mb-3">
                
                        <img src="https://www.ungei.org/sites/default/files/2020-09/UNICEF-UNI175116-Vishwanathan.JPG" class="card-img-top" alt="...">
                              <div class="card-body">


                     <h5>AJOUTER MATIERE</h5>
                    <form action ="{{  url('/storeMatiere') }}" method="get">
                         @csrf
                        <div class="form-group">
                          <label for="nomM">NOM MATIERE</label>
                          <input type="text" name="nomM" class="form-control" id="nomM" placeholder="nom du matiere">
                           @error('nomM')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        

                         <div class="form-group">
                          <label for="type">TYPE</label>
                          <input type="text" name="type" class="form-control" id="type" placeholder="type de matiere">
                           @error('type')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        

                        
                       
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form> 
                  </div> 
          </section>
               </div>
          </div>

        @elseif($layout == 'showMatiere')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                          @include("listeMatieres")
                        </section>
                        <section class="col-md-5">
                          
                        </section>
                  </div>    
            </div>
        @elseif($layout == 'editMatiere')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                           @include("listeMatieres")
                        </section>
                         <section class="col-md-5">
                         	 <h5 class="card-title">Modifier une matiere</h5>
		                    <form action ="{{  url('/updateMatiere/'.$matiere->id) }}" method="get">
		                         @csrf
		                       
		                        <div class="form-group">
                                    <label for="nomM">NOM MATIERE</label>
                                    <input value="{{ $matiere->nomM }}" type="text" name="nomM" class="form-control" id="nomM" placeholder="nom du matiere">
                            </div>
                           
                             <div class="form-group">
                          <label for="type">TYPE</label>
                          <input value="{{ $matiere->type }}" type="text" name="type" class="form-control" id="type"  placeholder="type de matiere">
                        </div>
                           
		                       
		                                <input type="submit" class="btn btn-info" value="Update">
                                    <input type="reset" class="btn btn-warning" value="Reset">
		                    </form> 
		                 </section>   	
                 </div>    
              </div>
        @endif
 
@endsection