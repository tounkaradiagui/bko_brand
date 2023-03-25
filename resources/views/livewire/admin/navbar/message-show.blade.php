<div>
    <div class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>La liste de mail reçu

                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="table bg-dark text-white">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Date de reception</th>
                                        {{-- <th>Message</th> --}}
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $mail )
                                        <tr>
                                            <td>{{$mail->nom}}</td>
                                            <td>{{$mail->prenom}}</td>
                                            <td>{{$mail->email}}</td>
                                            <td>{{$mail->created_at}}</td>
                                            {{-- <td>{{$mail->message}}</td> --}}
                                            <td class="text-center pl-2">
                                                <a href="" class="btn btn-primary btn-sm mr-2" title="Voir"><i class="mdi mdi-eye"></i></a></a>
                                                <a href="" class="btn btn-danger btn-sm"  title="Archiver"><i class="mdi mdi-delete"></i></a></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$messages->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
