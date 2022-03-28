 <div class="card mb-3">
  <img src="https://www.unhcr.org/thumb4/5a1e75d74.jpg" class="card-img-top" alt="..."> 
  
<div class="card-body">
   <h5 class="card-title">Liste des classes</h5>
    <p class="card-text">Vous pouvez trouver tous les informations de la classe dans ce systeme.</p>

          <div class="table-responsive">
                <table class="table table-striped" id="tab-exemple">
                      <thead class="thead-light">
                          <tr>
                            <!--<th scope="col">ID CLASSE</th>-->
                            <th scope="col">ENSEIGNANT</th>
                            <th scope="col">NOM CLASSE</th>
                            <th scope="col">DATE CLASSE</th>
                            <th scope="col">EFFECTIF</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">ACT</th>
                            <th scope="col">ACT</th>
                            <th scope="col">ACT</th>
                          </tr>
                    </thead>
                    <tbody>
                          @foreach($classes as $classe)
                          <tr>
                            <!-- <td>{{ $classe->id }}</td>-->
                            <td>{{ $classe->users_id }}</td>
                            <td>{{ $classe->nomClasse }}</td>
                            <td>{{ $classe->dateClasse }}</td>
                            <td>{{ $classe->effectif }}</td>
                            <td>{{ $classe->description }}</td>
                            <td>
                              <a href="{{ url('/showClasse/'.$classe->id) }}" class="btn-sm btn-info">Show</a>
                             </td> 
                             <td>
                              <a href="{{ url('/updateClasse/'.$classe->id) }}" class="btn-sm btn-warning">Edit</a>
                               </td>
                               <td>
                               <a href="{{ url('/destroyClasse/'.$classe->id) }}" class="btn-sm btn-danger">Delete</a>
                            </td>
                          </tr>
                         @endforeach
                    </tbody>
                </table>
          </div> 
   </div>