@extends('home')
 @section('title','Ma classe')
 @section('content')
    @if($layout == 'index')
            <div class="container-fluid mt-4 ">
               <div class="row">
                          @include("listeEleves")
                </div>          
             </div>         
        @elseif($layout == 'create')
         <div class="container-fluid mt-4 ">
              <div class="row">
                  <section class="col-md-7">
                    @include("listeEleves")
                  </section>
                  <section class="col-md-5">

                       <div class="card mb-3">
                        <img src="https://www.ungei.org/sites/default/files/2020-09/UNICEF-UNI175116-Vishwanathan.JPG" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Entrez les informations de l'eleve</h5>
                                
                      <form action ="{{  url('/store') }}" method="get">
                         @csrf
                        
                        <div class="form-group">
                          <label for="identifiant">IDENTIFIANT</label>
                          <input type="text" name="identifiant" class="form-control" id="identifiant" placeholder="identifiant de l'eleve">
                          @error('identifiant')
                                <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                       
                        <div class="form-group">
                          <label for="nom">NOM</label>
                          <input type="text" name="nom" class="form-control" id="nom" placeholder="nom de l'eleve">
                           @error('nom')
                                <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="prenom" >PRENOM</label>
                          <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom de l'eleve">
                           @error('prenom')
                                <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                         <div class="form-group">
                          <label for="sexe" >SEXE</label>
                          <input type="text" name="sexe" class="form-control" id="sexe" placeholder="sexe de l'eleve">
                           @error('sexe')
                                <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="date_naissance" >DATE DE NAISSANCE</label>
                          <input type="date" name="date_naissance" class="form-control" id="date_naissance" placeholder="date de naissance de l'eleve">
                           @error('date_naissance')
                                <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="lieu_de_naissance">LIEU DE NAISSANCE</label>
                          <input type="text" name="lieu_de_naissance" class="form-control" id="lieu_de_naissance" placeholder="lieu de naissance de l'eleve">
                           @error('lieu_de_naissance')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                         <div class="form-group">
                          <label for="nomClasse">NOM CLASSE</label>
                          <select class="form-control" name="classe_id" id="classe_id">
                                @foreach($classe as $elev)
                                  <option value="{{$elev->id}}">{{$elev->nomClasse}}</option> 
                                  @endforeach 
                            </select>
                           </div> 
                        <div class="form-group">
                          <label for="telephone" >TELEPHONE PARENT</label>
                          <input type="tel" name="telephone_parent" class="form-control" id="telephone_parent" placeholder="telephone parent d'eleve">
                          @error('telephone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="email1">EMAIL PARENT</label>
                          <input type="email"  class="form-control" name="email_parent" id="email_parent" placeholder="email parent d'eleve">
                          @error('email1')
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
        @elseif($layout == 'show')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                          @include("listeEleves")
                        </section>
                        <section class="col-md-5">
                          
                        </section>
                  </div>    
            </div>
        @elseif($layout == 'edit')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                          @include("listeEleves")
                        </section>
                          <section class="col-md-5">

                            <div class="card mb-3">
                                <img src="https://www.ungei.org/sites/default/files/2020-09/UNICEF-UNI175116-Vishwanathan.JPG" class="card-img-top" alt="...">
                                <div class="card-body">

                          <h5 class="card-title">Modifier les informations de l'eleve</h5>
                      <form action ="{{  url('/update/'.$student->id) }}" method="get">
                         @csrf
                        <div class="form-group">
                          <label for="identifiant">IDENTIFIANT</label>
                          <input value="{{ $student->identifiant }}" type="text" name="identifiant" class="form-control" id="identifiant" placeholder="identifiant de l'eleve">
                        </div>
                         
                        <div class="form-group">
                          <label for="nom">NOM</label>
                          <input value="{{ $student->nom }}" type="text" name="nom" class="form-control" id="nom" placeholder="nom de l'eleve">
                        </div>
                        <div class="form-group">
                          <label for="prenom" >PRENOM</label>
                          <input value="{{ $student->prenom }}" type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom de l'eleve">
                        </div>
                         <div class="form-group">
                          <label for="sexe" >SEXE</label>
                          <input value="{{ $student->sexe }}" type="text" name="sexe" class="form-control" id="sexe" placeholder="sexe de l'eleve">
                        </div>
                        <div class="form-group">
                          <label for="date_naissance" >DATE DE NAISSANCE</label>
                          <input value="{{ $student->date_naissance }}" type="date" name="date_naissance" class="form-control" id="date_naissance" placeholder="date de naissance de l'eleve">
                        </div>
                        <div class="form-group">
                          <label for="lieu_de_naissance">LIEU DE NAISSANCE</label>
                          <input value="{{ $student->lieu_de_naissance }}" type="text" name="lieu_de_naissance" class="form-control" id="lieu_de_naissance" placeholder="lieu de naissance de l'eleve">
                        </div>
                         <div class="form-group">
                          <label for="nomClasse">NOM CLASSE</label>
                          <select class="form-control" name="classe_id" id="classe_id">
                                @foreach($classe as $elev)
                                  <option value="{{$elev->id}}">{{$elev->nomClasse}}</option> 
                                  @endforeach 
                            </select>
                           </div> 
                        <div class="form-group">
                          <label for="telephone" >TELEPHONE PARENT</label>
                          <input value="{{ $student->telephone_parent }}" type="tel" name="telephone_parent" class="form-control" id="telephone_parent" placeholder="telephone parent d'eleve">
                        </div>
                        <div class="form-group">
                          <label for="email1">EMAIL PARENT</label>
                          <input value="{{ $student->email_parent }}" type="email"  class="form-control" name="email_parent" id="email_parent" placeholder="email parent d'eleve">
                        </div>
                        <input type="submit" class="btn btn-info" value="Update">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form>  

                                </div>
                          </div>
                        
                          </section>
                  </div>    
              </div>
        @endif

@endsection