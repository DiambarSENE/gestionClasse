<div class="card mb-3">
<img src="https://www.unhcr.org/thumb4/5a1e75d74.jpg" class="card-img-top" alt="...">
 <h5 class="card-title">List des matieres</h5>
    <p class="card-text">Vous pouvez trouver tous les informations de la matiere dans ce systeme.</p>

          <div class="table-responsive" >
                <table class="table table-striped" id="tab-exemple">
                      <thead class="thead-light">
                          <tr>
                            <th scope="col">NOM MATIERE</th>
                           

                            <th scope="col">TYPE</th>
                           

                            <th scope="col">ACT</th>
                            <th scope="col">ACT</th>
                            <th scope="col">ACT</th>
                          </tr>
                    </thead>
                    <tbody>
                          @foreach($matieres as $matiere)
                          <tr>
                            <td>{{ $matiere->nomM }}</td>
                           
                             <td>{{ $matiere->type}}</td>
                           
                           
                           
                            <td>
                              <a href="#" class="btn-sm btn-info">Show</a>
                             </td>
                             <td> 
                              <a href="{{ url('/updateMatiere/'.$matiere->id) }}" class="btn-sm btn-warning">Edit</a>
                            </td>
                            <td>
                            <a href="" class="btn-sm btn-danger">Delete</a>
                            </td>
                          </tr>
                         @endforeach
                    </tbody>
                </table>
            </div> 
   </div>