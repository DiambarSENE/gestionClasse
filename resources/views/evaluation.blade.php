@extends('home')
 @section('title','Ma classe')
 @section('content')
 <!--<script type="text/javascript">
     function Somme(){
        document.getElementById('T_LCC').value() = document.getElementById('voc').value()+document.getElementById('conj').value()+document.getElementById('gram').value()+documentgetElementById('orth').value();
        }
 </script>-->
     @if ($layout == 'indexEvaluation')
       <div class="container-fluid mt-4 ">
            <div class="row">
              @include("listeEvaluations")
            </div>  
        </div>           
    @elseif ($layout == 'createEvaluation')  
       <div class="container-fluid mt-4 ">
              <div class="row">
                  <section class="col-md-7">
                    @include("listeEvaluations")
                 </section>
                  <section class="col-md-5">

                       <div class="card mb-3">
                     <img src="https://www.ungei.org/sites/default/files/2020-09/UNICEF-UNI175116-Vishwanathan.JPG" class="card-img-top" alt="...">
                    <div class="card-body">
                  	<h5>INSERTION DES NOTES </h5>
                   
                    <form action ="{{  url('/storeEvaluation') }}" method="get">
                         @csrf

                        <div class="form-group"> 
                           <label for="nomClasse">ID_ELEVE</label>
                            <select class="form-control" name="eleve_id" id="eleve_id">
                                @foreach($eleve as $u)
                                  <option value="{{$u->id}}">{{$u->nom}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                          
                        <div class="form-group" hidden="nomM"> 
                           <label for="nomM">matiere</label>
                            <select  class="form-control" name="matiere_id" id="matiere_id">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                         
                      <div class="form-group">
                          <label for="trimestre">TRIMESTRE</label>
                           <select class="form-control" name="trimestre" id="trimestre" name="trimestre">
                                  <option value="COMPOSITION DU 1er TRIMESTRE">1er_trimestre</option>
                                  <option value="COMPOSITION DU 2éme TRIMESTRE">2eme_trimestre</option>
                                  <option value="COMPOSITION DU 3éme TRIMESTRE">3eme_trimestre</option> 
                            </select>
                        </div>
                       <div class="form-group"> 
                           <label for="voc">vocabulaire</label>
                            <select class="form-control" name="voc">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('voc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input value="" type="number" name="voc" class="form-control" id="voc" min="0" max="10" placeholder="note de vocabulaire">
                        </div>


                        <div class="form-group"> 
                           <label for="conj">conjugaison</label>
                            <select class="form-control" name="conj">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                         @error('conj')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input value="" type="number" name="conj" class="form-control" id="conj" min="0" max="10" placeholder="note de conjugaison">
                        </div>


                        <div class="form-group"> 
                           <label for="gram">grammaire</label>
                            <select class="form-control" name="gram">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('gram')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input value="" type="number" name="gram" class="form-control" id="gram" min="0" max="10" placeholder="note de grammaire">
                        </div>


                        <div class="form-group"> 
                           <label for="orth">orthographe</label>
                            <select class="form-control" name="orth">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('orth')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input value="" type="number" name="orth" class="form-control" id="orth" min="0" max="10" placeholder="note d'orthographe">
                        </div>
                         

                          <div class="form-group"> 
                           <label for="AN">Activites Numeriques</label>
                            <select class="form-control" name="AN" id="AN">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                         @error('AN')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="AN" class="form-control" id="AN" min="0" max="10" placeholder="note d'Activites Numerique">
                        </div>

                        
                         <div class="form-group"> 
                           <label for="AM">Activites de mesure</label>
                            <select class="form-control" name="AM" id="AM">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                         @error('AM')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="AM" class="form-control" id="AM" min="0" max="10" placeholder="note d'Activites mesure">
                        </div>
                        

                         <div class="form-group"> 
                           <label for="AG">Activites de geometrique</label>
                            <select class="form-control" name="AG" id="AG">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                         @error('AG')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="AG" class="form-control" id="AG" min="0" max="10" placeholder="note d'Activites geometrique">
                        </div>

                        


                        <div class="form-group"> 
                           <label for="RPR">Resolution de probleme resour</label>
                            <select class="form-control" name="RPR" id="RPR">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                       
                        <div class="form-group">
                          <label for="RPR">Resolution de probleme resour</label>
                          <input type="number" name="RPR" class="form-control" id="RPR" min="0" max="10" placeholder="note de l'eleve">
                           @error('RPR')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group"> 
                           <label for="RPC">Resolution de probleme competences</label>
                            <select class="form-control" name="RPC" id="RPC">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                   
                        <div class="form-group">
                          @error('RPC')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="RPC" class="form-control" id="RPC" min="0" max="60" placeholder="note Resolution de probleme resources">
                        </div>

                         
                        <div class="form-group"> 
                           <label for="DMC">Educa scien vie sociale comp</label>
                            <select class="form-control" name="DMC" id="DMC">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('DMC')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="DMC" class="form-control" id="DMC" min="0" max="16" placeholder="note Educa scien vie sociale comp">
                        </div>

                        <div class="form-group"> 
                           <label for="DMR">Educa scien vie sociale resour</label>
                            <select class="form-control" name="DMR" id="DMR">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('DMR')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="DMR" class="form-control" id="DMR" min="0" max="24" placeholder="note Educa scien vie sociale resour">
                        </div>

                        <div class="form-group"> 
                           <label for="EDDC">Educa Develop durable comp</label>
                            <select class="form-control" name="EDDC" id="EDDC">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('EDDC')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="EDDC" class="form-control" id="EDDC" min="0" max="16" placeholder="note d'Application Geometrique">
                        </div>
                        <div class="form-group"> 
                           <label for="EDDR">Educa Develop durable resour</label>
                            <select class="form-control" name="EDDR" id="EDDR">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('EDDR')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="EDDR" class="form-control" id="EDDR" min="0" max="24" placeholder="note d'Application Geometrique">
                        </div>

                        <div class="form-group"> 
                           <label for="AP">Art Plastique</label>
                            <select class="form-control" name="AP" id="AP">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('AP')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="AP" class="form-control" id="AP" min="0" max="10" placeholder="note d'Application Geometrique">
                        </div>

                        <div class="form-group"> 
                           <label for="Arab">Arabe</label>
                            <select class="form-control" name="Arab" id="Arab">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nomM}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          @error('Arab')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          <input type="number" name="Arab" class="form-control" id="Arab" min="0" max="20" placeholder="note d'Application Geometrique">
                        </div>
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form> 
                   </div>
          </div>
        </section>
        @elseif($layout == 'showEvaluation')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                          @include("listeEvaluations")
                        </section>
                        <section class="col-md-5">
                          
                        </section>
                  <div class="row">    
            </div>
        @elseif($layout == 'editEvaluation')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                          @include("listeEvaluations")
                        </section>
                         <section class="col-md-5">
                         	<h5>MODIFICATION EVALUATION DANS LA BASE DE DONNEE</h5>
                    <form action ="{{  url('/updateEvaluation/'.$evaluation->id) }}" method="get">
                         @csrf
                          <div class="form-group"> 
                           <label for="nomClasse">ID_ELEVE</label>
                            <select class="form-control" name="eleve_id" id="eleve_id">
                                @foreach($eleve as $ele)
                                  <option value="{{$ele->id}}">{{$ele->identifiant}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                         <div class="form-group"> 
                           <label for="nomClasse">MATIERE</label>
                            <select class="form-control" name="matiere_id" id="matiere_id">
                                @foreach($matiere as $mati)
                                  <option value="{{$mati->id}}">{{$mati->nom}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="trimestre">TRIMESTRE</label>
                          <input value="{{ $evaluation->trimestre }}" type="number" name="trimestre" class="form-control" id="trimestre" min="0" max="3" placeholder="le trimestre">
                        </div>
                        <div>
                          <label for="note">NOTE</label>
                          <input value="{{ $evaluation->note }}" type="number" name="note" class="form-control" id="note" min="0" max="20" placeholder="note">
                        </div>
                         <input type="submit" class="btn btn-info" value="Update">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form> 
                            
		                    </form> 
		                 </section>   	
                 <div class="row">    
              </div>
        @endif

@endsection