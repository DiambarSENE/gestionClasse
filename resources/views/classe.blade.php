  @extends('home')
 @section('title','Ma classe')
 @section('content')
     @if ($layout == 'indexClasse')
        <div class="container-fluid mt-4 ">
            <div class="row">
                @include("listeClasses")
            </div>    
        </div>            
    @elseif ($layout == 'createClasse')  
        <div class="container-fluid mt-4 ">
             <div class="row">
                 <section class="col-md-7">
                    @include("listeClasses")
                 </section>
                  <section class="col-md-5">  

                            <div class="card mb-3">
                                <img src="https://www.ungei.org/sites/default/files/2020-09/UNICEF-UNI175116-Vishwanathan.JPG" class="card-img-top" alt="...">
                                <div class="card-body">
                  	<h5>CREATION D'UNE CLASSE:</h5>
                    <form action ="{{  url('/storeClasse') }}" method="get">
                         @csrf
                       <div class="form-group"> 
                           <label for="nomClasse">NOM DE ENSEIGNANT</label>
                            <select class="form-control" name="users_id" id="users_id">
                                @foreach($us as $u)
                                  <option value="{{$u->id}}">{{$u->name}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="nomClasse">NOM CLASSE</label>
                          <input type="text" name="nomClasse" class="form-control" id="nomClasse" placeholder="nom de la Classe de l'eleve">
                           @error('nomClasse')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="dateClasse">DATE DE LA CLASSE</label>
                          <input type="date" name="dateClasse" class="form-control" id="dateClasse" placeholder="date de la Classe de l'eleve">
                           @error('dateClasse')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="effectif" >EFFECTIFS</label>
                          <input type="number" name="effectif" class="form-control" id="effectif" placeholder="effectif de la classe" min="0" max="70">
                           @error('effectif')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                         <div class="form-group">
                          <label for="description" >DESCRIPTION</label>
                          <textarea  type="text" name="description" class="form-control" id="description" placeholder="description de la classe"></textarea>
                           @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form> 
                   </div>
          </div>
           </section>
         </div>
        </div>
         
        @elseif($layout == 'showClasse')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7" >
                          <div class="card mb-3">
                               <img src="https://www.unhcr.org/thumb4/5a1e75d74.jpg" class="card-img-top" alt="..."> 
  
                           <div class="card-body">
                           @foreach($classes as $classe)
                          
                            <h1 align="center">Classe de Monsieur\Madame : {{ $classe->users_id }}</h1>
                            <h1 align="center">Nom de la classe: {{ $classe->nomClasse }}</h1>
                            <h1 align="center">Annee da la classe: {{ $classe->dateClasse }}</h1>
                            <h1 align="center">La classe comporte : {{ $classe->effectif }}  eleves</h1>
                            
                             <h1 align="left">La description : {{ $classe->description }}  eleves</h1>
                            
                         @endforeach
                       </div>
                        </section>
                        <section class="col-md-5">
                          
                        </section>
                  <div class="row">    
            </div>
        @elseif($layout == 'editClasse')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                          @include("listeClasses")
                        </section>
                         <section class="col-md-5">

                            <div class="card mb-3">
                                <img src="https://www.ungei.org/sites/default/files/2020-09/UNICEF-UNI175116-Vishwanathan.JPG" class="card-img-top" alt="...">
                                <div class="card-body">
                         	 <h5 class="card-title">Modifier les informations de la classe</h5>
		                    <form action ="{{  url('/updateClasse/'.$classe->id) }}" method="get">
		                         @csrf
                              <div class="form-group"> 
                           <label for="nomClasse">NOM DE ENSEIGNANT</label>
                            <select class="form-control" name="users_id" id="users_id">
                                @foreach($us as $u)
                                  <option value="{{$u->id}}">{{$u->name}}</option> 
                                  @endforeach 
                            </select>
                        </div>
		                        <div class="form-group">
		                          <label for="nomClasse">NOM CLASSE</label>
		                          <input value="{{ $classe->nomClasse }}" type="text" name="nomClasse" class="form-control" id="nomClasse" placeholder="nom de la Classe de l'eleve">
		                        </div>
		                        <div class="form-group">
		                          <label for="dateClasse">DATE DE LA CLASSE</label>
		                          <input value="{{ $classe->dateClasse }}" type="date" name="dateClasse" class="form-control" id="dateClasse" placeholder="date de la Classe de l'eleve">
		                        </div>
		                        <div class="form-group">
		                          <label for="effectif" >EFFECTIFS</label>
		                          <input value="{{ $classe->effectif }}" type="number" name="effectif" class="form-control" id="effectif" placeholder="effectif de la classe" min="0" max="70">
		                        </div>
		                         <div class="form-group">
		                          <label for="description" >DESCRIPTION</label>
		                          <textarea input value="{{ $classe->description }}" type="text" name="description" class="form-control" id="description" placeholder="description de la classe"></textarea>
		                        </div>
		                       
		                        <input type="submit" class="btn btn-info" value="Update">
                        <input type="reset" class="btn btn-warning" value="Reset">
		                    </form> 
                      </div>
                     </div> 
		                 </section>   	
                 <div >    
              </div>
        @endif

@endsection