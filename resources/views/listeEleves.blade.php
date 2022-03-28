<div class="card mb-3">
<img src="https://www.unhcr.org/thumb4/5a1e75d74.jpg" class="card-img-top" alt="...">
    <h5 class="card-title">List des eleves</h5>
    <p class="card-text">Vous pouvez trouver tous les informations de l'eleve dans ce system.</p>

          <div class="table-responsive">
                <table class="table table-striped" id="tab-exemple">
                      <thead class="thead-light">
                          <tr>
                           
                            <th scope="col">IDENTIFIANT</th>
                            <th scope="col">NOM</th>
                            <th scope="col">PRENOM</th>
                            <th scope="col">DATE DE NAISSANCE</th>
                            <th scope="col">LIEU DE NAISSANCE</th>
                             <th scope="col">ID CLASSE</th>
                            <th scope="col">TELEPHONE PARENT</th>
                            <th scope="col">EMAIL PARENT</th>
                             <th scope="col">Operations</th>
                          </tr>
                    </thead>
                    <tbody>
                          @foreach($students as $student)
                          <tr>
                            
                            <td>{{ $student->identifiant }}</td>
                            <td>{{ $student->nom }}</td>
                            <td>{{ $student->prenom }}</td>
                            <td>{{ $student->date_naissance }}</td>
                            <td>{{ $student->lieu_de_naissance }}</td>
                             <td>{{ $student->classe_id }}</td>
                            <td>{{ $student->telephone_parent }}</td>
                            <td>{{ $student->email_parent }}</td>
                            <td> 
                              <!--<a href="#" class="btn-sm btn-info">Show</a>-->
                           <a href="{{ url('/edit/'.$student->id) }}" class="btn-sm btn-warning">Edit</a>
                            <!--  <a href="" class="btn-sm btn-danger">Delete</a>-->
                           </td>
                          </tr>
                         @endforeach
                          
                    </tbody>
                </table>

</div>



           