 @extends('home')
 @section('title','Ma classe')
 @section('content')
     @if ($layout == 'indexBulletin')
        <div class="container-fluid mt-4 ">
            <div class="row">
                @include("listeBulletins")
           </div>
        </div>           
    @elseif ($layout == 'createBulletin')  
         <div class="container-fluid mt-4 ">
              <div class="row">
                  <section class="col-md-7">
                  <div class="card mb-3">
              <img src="https://www.unhcr.org/thumb4/5a1e75d74.jpg" class="card-img-top" alt="...">
               <h5 class="card-title">Listes des bulletins generer</h5>
                     <div class="table-responsive">
                  <table class="table table-striped" id="tab-exemple">
                      <thead class="thead-light">
                          <tr>
                           
                             <th scope="col">ID_EL</th>
                              <th scope="col">NOM</th>
                               <th scope="col">PRENOM</th>
                             <th scope="col">compo</th>
                           
                             <th scope="col">ACTI</th>
                             <th scope="col">ACTI</th>
                             <th scope="col">ACTI</th>
                          </tr>
                    </thead>
                    <tbody>
                          @foreach($bulletins as $student)
                          <tr>
                            
                            <td>{{ $student->eleve_id }}</td>
                             <td>{{ $student->nom }}</td>
                            <td>{{ $student->prenom }}</td>
                            <td>{{ $student->compo }}</td>
                           
                            <td> 
                            <a href="{{ url('/showBulletin/'.$student->id) }}" class="btn-sm btn-info">Show</a>
                          </td>
                          <td>
                           <a href="{{ url('/updateBulletin/'.$student->id) }}" class="btn-sm btn-warning">Edit</a>
                         </td>
                         <td>
                           <a href="{{ url('/destroyBulletin/'.$student->id) }}" class="btn-sm btn-danger">Delete</a>
                           </td>
                          </tr>
                         @endforeach
                          
                    </tbody>
                </table>
             </div>
           </div>
                 </section>
             

                  <section class="col-md-5">  
                    <div class="card mb-3">
                               
                                <div class="card-body">
                  	<h5>INSERTION BULLETIN DANS LA BASE DE DONNEE</h5>
                    <form action ="{{  url('/storeBulletin') }}" method="get">
                         @csrf
                          <div class="form-group"> 
                           <label for="nomClasse">ID_ELEVE</label>
                            <select class="form-control" name="eleve_id" id="eleve_id">
                                @foreach($eleve as $u)
                                  <option value="{{$u->id}}">{{$u->nom}}</option> 
                                  @endforeach 
                            </select>
                        </div>
                       
                          <div class="form-group"> 
                           
                        <label for="compo">TRIMESTRE</label>
                           <select class="form-control" name="compo" id="compo" name="compo">
                                  <option value="1eme trimestre">1er_trimestre</option>
                                  <option value="2eme trimestre">2eme_trimestre</option>
                                  <option value="3eme trimestre">3eme_trimestre</option> 
                            </select>
                            </select>
                        </div>
                        
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form> 
                   </div>
                 </div>
               </section>
          </div>
      </div>
      @elseif($layout == 'showBulletin')
            <div class="container-fluid mt-4 ">
                  <div class="row">
                      <div class="container-fluid mt-4">
    <button class="btn btn-success btn-xs" onClick="imprimer('sectionAimprimer')">Imprimer</button>
        <div class="row justify-content-center" id='sectionAimprimer'>   
             <section class="col-md-10">   
                       <div class="card mb-3">

<table border="1px" >
                       @foreach($bulletins as $bul)
                                @if($bul->id == $bul->eleve_id)
                            
                           <div class="col" style="text-align: left;">
                              <p> IA: Ziguinchor</p>
                            </div> 
                           <div class="col" style="text-align: center;">
                              <p> IEF:Ziguinchor</p>
                            </div> 
                           <div style="text-align: right;"> 
                                <p> Annee scolaire: {{ $bul->annee}}</p> 
                            </div>
                            <div style="text-align: right;"> 
                                <p> Maitre(sse): M.{{ $bul->name }}</p> 
                            </div>
                            <div style="text-align: right;"> 
                                <p> Classe: M.{{ $bul->nomClasse }}</p> 
                            </div>
                           <h4 style="text-align: center;">
                              <strong>{{ $bul->trimestre}}</strong>
                             </h4> 
                            <div class="col" style="text-align: center;">
                              <p> NOM: {{  $bul->nom  }}</p>
                            </div> 
                            
                            <div class="col" >
                            <p> PRENOM: {{ $bul->prenom  }}</p>
                            </div>  
                            <div style="text-align: right;"> 
                               <p>date de naissance: {{ $bul->date_naissance }}</p>
                            </div>
                            <div class="col" >
                            <p> sexe: {{ $bul->sexe }}</p>
                            </div>  
                            <div class="col"  style="text-align: center;"> 
                               <p>Ecole: {{ $bul->ecole }} </p>
                             </div>
                             <div class="col"  style="text-align: right;"> 
                               <p>Effectif: </p>
                             </div>  
                           
      <table class="std_table" id="table_sortSearchResult" date-toggle="table" border="1px">
                               <thead>
                                  <tr> 
                                       <th>Domaines</th>
                                       <th>Activites</th>
                                       <th>Notes</th>
                                       <th align="center">NT</th>
                                       <th>Mentions</th>
                                       <th>Appreciation</th>
                                  </tr>
                               </thead>

                               <tbody>
                               
                                  <tr>
                                     <td rowspan='2' align="center">francais</td>
                                     <td>langue & Comp.ress</td>
                                     <?php   
                                         $som = $bul->voc+ $bul->conj;
                                     ?>
                                     <td align="right">{{ $som }}</td>
                                     <td align="center">40</td>
                                     <?php 
                                      
                                         if($som  < 20){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($som  >= 20) && ($som < 24)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($som  >= 24) && ($som < 28)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($som  >= 28) && ($som < 32)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($som  >= 32) && ($som < 36)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($som  >= 36) && ($som <= 40)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                     
                                        <?php 
                                          /*appreciation du bulletin*/
                                     
                                          $somm = $bul->voc+ $bul->conj+ $bul->gram + $bul->orth + $bul->AN + $bul->AM + $bul->AG + $bul->AP+ $bul->EDDC+ $bul->EDDR+ $bul->DMR+ $bul->DMC+ $bul->RPR+ $bul->RPC;
                                           $moy = ($somm*10)/290;
                                           

                                                 if ($moy < 4){
                                                     echo "<td rowspan='13' align='center'>mediocre</td>";
                                                  }
                                                  elseif (($moy >= 4) && ($moy < 5)) {
                                                     echo "<td rowspan='13' align='center'>passable</td>";
                                                  }
                                                  elseif (($moy >= 5) && ($moy < 6)) {
                                                     echo "<td rowspan='13' align='center'>A bien</td>";
                                                  }
                                                  elseif (($moy >= 6) && ($moy < 7)) {
                                                     echo "<td rowspan='13' align='center'> bien</td>";
                                                  }
                                                  elseif (($moy >= 7) && ($moy < 8)) {
                                                     echo "<td rowspan='13' align='center'>tres bien</td>";
                                                  }
                                                  elseif (($moy >= 8) && ($moy < 10)) {
                                                     echo "<td rowspan='13' align='center'>excellent</td>";
                                                  }
                                                  
                                             ?>
                                          
                                  </tr>
                                 <tr>
                                    
                                    <td>langue & Comp.comp</td>
                                    <?php   
                                         $som = $bul->gram+ $bul->orth;
                                     ?>
                                     <td align="right">{{ $som }}</td>
                                      <td align="center">60</td>
                                       <?php 
                                         if($bul->conj < 30){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->conj >= 30) && ($bul->conj < 36)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->conj >= 36) && ($bul->conj < 42)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->conj >= 42) && ($bul->conj < 48)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->conj >= 48) && ($bul->conj < 54)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->conj >= 54) && ($bul->conj <= 60)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                     
                                  </tr>
                                  <tr>
                                     <td rowspan='5' align="center">mathematiques</td>
                                    <td>Activites numeriques</td>
                                     <td align="right">{{ $bul->AN }}</td>
                                      <td align="center">10</td>
                                       <?php 
                                         if($bul->AN < 5){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->AN >= 5) && ($bul->AN < 6)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->AN >= 6) && ($bul->AN < 7)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->AN >= 7) && ($bul->AN < 8)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->AN >= 8) && ($bul->AN < 9)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->AN >= 9) && ($bul->AN <= 10)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                      
                                  </tr>
                                  <tr>
                                    
                                    <td>Activites geometrique</td>
                                     <td align="right">{{ $bul->AG }}</td>
                                      <td align="center">10</td>
                                      <?php 
                                         if($bul->AG < 5){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->AG >= 5) && ($bul->AG < 6)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->AG >= 6) && ($bul->AG < 7)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->AG >= 7) && ($bul->AG < 8)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->AG >= 8) && ($bul->AG < 9)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->AG >= 9) && ($bul->AG <= 10)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                      
                                  </tr>
                                   <tr>
                                    
                                    <td>Activites de mesures</td>
                                      <td align="right">{{ $bul->AM }}</td>
                                       <td align="center">10</td>
                                       <?php 
                                         if($bul->AM < 5){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->AM >= 5) && ($bul->AM < 6)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->AM >= 6) && ($bul->AM < 7)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->AM >= 7) && ($bul->AM < 8)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->AM >= 8) && ($bul->AM < 9)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->AM >= 9) && ($bul->AM <= 10)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                     
                                  </tr>
                                  
                                   <tr>
                                   
                                    <td>Resolution de problemes<br>Ressources</td>
                                       <td align="right">{{ $bul->RPR }}</td>
                                        <td align="center">10</td>
                                       <?php 
                                         if($bul->RPR < 5){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->RPR >= 5) && ($bul->RPR < 6)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->RPR >= 6) && ($bul->RPR < 7)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->RPR >= 7) && ($bul->RPR < 8)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->RPR >= 8) && ($bul->RPR < 9)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->RPR >= 9) && ($bul->RPR <= 10)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                        
                                  </tr>
                                  <tr>
                                    <td>Resolution de problemes<br>Competences</td>
                                       <td align="right">{{ $bul->RPC }}</td>
                                        <td align="center">60</td>
                                       <?php 
                                         if($bul->RPC < 30){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->RPC >= 30) && ($bul->RPC < 36)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->RPC >= 36) && ($bul->RPC < 42)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->RPC >= 42) && ($bul->RPC < 48)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->RPC >= 48) && ($bul->RPC < 54)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->RPC >= 54) && ($bul->RPC <= 60)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                  </tr>
                                   
                                  <tr>
                                     <td rowspan='2'>Education a la science<br>et a la vie sociale</td>
                                     <td>D M Ressources</td>
                                      <td align="right">{{ $bul->DMR }}</td>
                                       <td align="center">24</td>
                                       
                                      <?php 
                                         if($bul->DMR < 12){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->DMR >= 12) && ($bul->DMR < 14)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->DMR >= 14) && ($bul->DMR < 16)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->DMR >= 16) && ($bul->DMR < 18)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->DMR >= 18) && ($bul->DMR < 20)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->DMR >= 20) && ($bul->DMR <= 24)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                  
                                  </tr>
                                  <tr>
                                  
                                     <td>D M Competences</td>
                                      <td align="right">{{ $bul->DMC }}</td>
                                       <td align="center">16</td>
                                       
                                           <?php 
                                         if($bul->DMC < 8){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->DMC >= 8) && ($bul->DMC < 10)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->DMC >= 10) && ($bul->DMC < 12)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->DMC >= 12) && ($bul->DMC < 14)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->DMC >= 14) && ($bul->DMC < 15)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->DMC >= 15) && ($bul->DMC <= 16)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                        
                                  </tr>
                                   <tr>
                                     <td rowspan='2'>Education au<br>developpement durable</td>
                                     <td>EDD Ressources</td>
                                      <td align="right">{{ $bul->EDDR }}</td>
                                       <td align="center">16</td>
                                      
                                           <?php 
                                         if($bul->EDDR < 8){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->EDDR >= 8) && ($bul->EDDR < 10)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->EDDR >= 10) && ($bul->EDDR < 12)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->EDDR >= 12) && ($bul->EDDR < 14)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->EDDR >= 14) && ($bul->EDDR < 15)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->EDDR >= 15) && ($bul->EDDR <= 16)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                       

                                  </tr>
                                  <tr>
                                   
                                     <td>EDD Competances</td>
                                      <td align="right">{{ $bul->EDDC }}</td>
                                       <td align="center">24</td>
                                      
                                           <?php 
                                         if($bul->EDDC < 12){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->EDDC >= 12) && ($bul->EDDC < 14)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->EDDC >= 14) && ($bul->EDDC < 16)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->EDDC >= 16) && ($bul->EDDC < 18)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->EDDC >= 18) && ($bul->EDDC < 20)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->EDDC >= 20) && ($bul->EDDC <= 24)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                       
                                  </tr>
                                  <tr>
                                    
                                     <td colspan='2' align="center">Arts Plastiques</td>
                                      <td align="right">{{ $bul->AP }}</td>
                                       <td align="center">10</td>
                                       
                                           <?php 
                                         if($bul->AP < 5){
                                            echo "<td>insuffisant</td>";
                                         }
                                         elseif(($bul->AP >= 5) && ($bul->AP < 6)){
                                            echo "<td>passable</td>";
                                         }
                                         elseif(($bul->AP >= 6) && ($bul->AP < 7)){
                                            echo "<td>A bien</td>";
                                         }
                                         elseif(($bul->AP >= 7) && ($bul->AP < 8)){
                                            echo "<td>bien</td>";
                                         }
                                         elseif(($bul->AP >= 8) && ($bul->AP < 9)){
                                            echo "<td>tres bien</td>";
                                         }
                                         elseif(($bul->AP >= 9) && ($bul->AP <= 10)){
                                            echo "<td>excellent</td>";
                                         }
                                     ?> 
                                     

                                  </tr>
                                  <tr>
                                  
                                     <td colspan='2' align="center">Arabe</td>
                                      <td></td>
                                       <td></td>
                                        <td></td>
                                         

                                  </tr>
                                 <tr>
                                      <td colspan="2" align="center" rowspan="4"> TOTAL</td>
                                      
                                     <?php 
                                          $som = $bul->voc+ $bul->conj+ $bul->gram + $bul->orth + $bul->AN + $bul->AM + $bul->AG + $bul->AP+ $bul->EDDC+ $bul->EDDR+ $bul->DMR+ $bul->DMC+ $bul->RPR+ $bul->RPC;
                                           echo "<td rowspan='4' align='right'>".$som."</td>"; 
                                           $moy = ($som*10)/290;
                                           $moy = round($moy,2);
                                            echo "<td rowspan='2' align='center'>".'290'."</td>"; 
                                           
                                      ?>

                                       <td align="center" colspan="2">Moy. 1er trim</td>
                                   
                                  </tr> 

                                   <tr> 
                                   
                                    <?php  echo "<td align='center'>".$moy."</td>";  ?>
                                
                                          <td align="center">/10</td>
                                       
                                    </tr>  
                                    <tr>
                                        <td align="center" >rang</td>
                                        <td align="center">vide</td>
                                        <td align="center"></td>
                                               
                                  </tr>
                                </tbody>
                              

                            </table>
                            <div class="col" style="text-align: center;">
                              <p style="text-decoration: underline;"> le(la) Maitre(sse)</p>
                            </div> 
                            
                            <div class="col" >
                            <p style="text-decoration: underline;"> le(la) Directeur(trice)</p>
                            </div>  
                            <div style="text-align: right;"> 
                               <p style="text-decoration: underline;">le Parent</p>
                            </div>
                            <br><br>
                        @endif
                    @endforeach 
   </table>
   
  </div>
       </section>    
     </div>
   </div>
 </div>
</div>

                        <section class="col-md-5">
                          
                        </section>
                  </div>    
            </div>

        @elseif($layout == 'editBulletin')
             <div class="container-fluid mt-4 ">
                  <div class="row">
                        <section class="col-md-7">
                          @include("listeBulletins")
                        </section>
                         <section class="col-md-5">
                         
                            
		                   
		                    </section>   	
                 </div>    
              </div>
        @endif
@endsection