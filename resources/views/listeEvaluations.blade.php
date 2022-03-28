<div class="card mb-3">
  <img src="https://www.unhcr.org/thumb4/5a1e75d74.jpg" class="card-img-top" alt="..."> 
      
      <div class="card-body">
<h5 class="card-title">List des Evaluations</h5>
    <h5 class="card-text">Vous pouvez trouver tous les informations des evaluations dans ce systeme.</h5>

          <div class="table-responsive">
                <table class="table table-striped" id="tab-exemple">
                      <thead class="thead-light">
                          <tr>
                            <th scope="col">IDENTIF</th>
                            <th scope="col">NOM</th>
                            <th scope="col">PRENOM</th>
                            <th scope="col">SEXE</th>

                            <th scope="col">voc</th> 
                            <th scope="col">conj</th>
                            <th scope="col">gram</th> 
                            <th scope="col">orth</th> 

                            <th scope="col">AN</th> 
                            <th scope="col">AM</th> 
                            <th scope="col">AG</th> 

                            <th scope="col">RPR</th> 
                            <th scope="col">RPC</th>
                            
                            <th scope="col">DMR</th> 
                            <th scope="col">DMC</th>
                         
                            <th scope="col">EDDR</th>
                            <th scope="col">EDDC</th>

                           
                            <th scope="col">AP</th>
                           
                            <th scope="col">Ar</th>
                                       
           
                            <th scope="col">ACTIONS</th>
                            <th scope="col">ACTIONS</th>
                          </tr>
                    </thead>
                    <tbody>
                          @foreach($evaluations as $evaluation) 
                          <tr>
                            <td>{{ $evaluation->identifiant}}</td>
                            <td>{{ $evaluation->nom }}</td>  
                            <td>{{ $evaluation->prenom }}</td> 
                            <td>{{ $evaluation->sexe }}</td> 

                            <td>{{ $evaluation->voc}}</td>
                            <td>{{ $evaluation->conj }}</td>
                            <td>{{ $evaluation->gram }}</td>
                            <td>{{ $evaluation->orth }}</td>
                            
                            <td>{{ $evaluation->AN }}</td>
                            <td>{{ $evaluation->AM }}</td>
                            <td>{{ $evaluation->AG }}</td>

                            <td>{{ $evaluation->RPR }}</td>
                            <td>{{ $evaluation->RPC }}</td>

                            
                            <td>{{ $evaluation->DMR }}</td>
                            <td>{{ $evaluation->DMC }}</td>
                            
                            <td>{{ $evaluation->EDDR }}</td>
                            <td>{{ $evaluation->EDDC }}</td> 
                           
                            <td>{{ $evaluation->AP }}</td> 
                           
                            <td>{{ $evaluation->Ar }}</td> 
                                
                          <td>
                            
                             <a href="{{ url('/showEvaluation/'.$evaluation->id) }}" class="btn-sm btn-info">Show</a>
                              </td>
                              <td> 
                              <a href="{{ url('/editEvaluation/'.$evaluation->id) }}" class="btn-sm btn-warning">Edit</a>
                                </td>
                               </td>  
                             <td>  
                              <a href="{{ url('/destroyEvaluation/'.$evaluation->id) }}" class="btn-sm btn-danger">Delete</a>
                            </td>
                          </tr>
                         @endforeach
                    </tbody>
                </table>
         </div> 
   </div>


