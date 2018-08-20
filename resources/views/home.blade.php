@extends('layouts.app')

@section('style')
<link href="{{ asset('css/projet.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div id="projet">

        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Nouveau Projet</button>

        <div class="col-12 modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="col-12  modal-content">
                
                <form id="clientForm" class="row form-horizontal" method="POST" v-on:submit.prevent="clientSubmit">
                    @csrf

                    <div class="col-sm-6" >
                    <div class="form-group">
                    <label for="nom" class="col-sm-6 control-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="prenom" class="col-sm-6 control-label">Prenom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="adresse" class="col-sm-6 control-label">Adresse</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="cin" class="col-sm-6 control-label">CIN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="tel1" class="col-sm-6 control-label">Tel1</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tel1" name="tel1" placeholder="Tel1">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="tel2" class="col-sm-6 control-label">Tel2</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tel2" name="tel2" placeholder="Tel2">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="nationalite" class="col-sm-6 control-label">Nationalite</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nationalite" name="nationalite" placeholder="Nationalite">
                    </div>
                    </div>

                    </div>

                    <div class="col-sm-6" >

                    <div class="form-group">
                    <label for="profession" class="col-sm-6 control-label">Profession</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="dateNaissance" class="col-sm-6 control-label">Date de Naissance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="Date de naissance">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="lieuNaissance" class="col-sm-6 control-label">lieu de Naissance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lieuNaissance" name="lieuNaissance" placeholder="lieu de naissance">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="nomPere" class="col-sm-6 control-label">Nom de pere</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomPere" name="nomPere" placeholder="Nom de pere">
                    </div>
                    </div>


                    <div class="form-group">
                    <label for="nomMere" class="col-sm-6 control-label">Nom de mere</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomMere" name="nomMere" placeholder="Nom de mere">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="representantLegal" class="col-sm-6 control-label">Representant legal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="representantLegal" name="representantLegal" placeholder="Representant legal">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="natureJuridique" class="col-sm-6 control-label">Nature Juridique</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="natureJuridique" name="natureJuridique" placeholder="Nature Juridique">
                    </div>
                    </div>



                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="submitClient" class="btn btn-default"> Suivant -></button>
                    </div>
                    </div>

                    </div>

                </form>

                <form id="projetForm" class="none row form-horizontal" method="POST" v-on:submit.prevent="projetSubmit">
                    @csrf
                    <div class="col-6">

                    <div class="form-group">
                        <label for="idClient" class="col-sm-6 control-label">ID du Client</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="idClientP" value="22" name="idClient" placeholder="ID du Client">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="idAdmin" class="col-sm-6 control-label">ID du Admin</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="idAdmin" value="1" name="idAdmin" placeholder="ID du Admin">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomProjet" class="col-sm-6 control-label">Nom du projet</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomProjet" name="nomProjet" placeholder="Nom du projet">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="etat" class="col-sm-6 control-label">Etat</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="etat" name="etat" placeholder="Etat">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prix" class="col-sm-6 control-label">Prix</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="delaiRealisation" class="col-sm-6 control-label">Delai de Realisation</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="delaiRealisation" name="delaiRealisation" placeholder="Delai de Realisation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-6 control-label">Type</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="type" name="type" placeholder="Type">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nature" class="col-sm-6 control-label">Nature</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nature" name="nature" placeholder="Nature">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="situationTerrain" class="col-sm-6 control-label">Situation du terrain</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="situationTerrain" name="situationTerrain" placeholder="Situation du terrain">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="commune" class="col-sm-6 control-label">Commune</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="commune" name="commune" placeholder="Commune">
                        </div>
                    </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                        <label for="surfaceTotale" class="col-sm-6 control-label">Surface totale</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="surfaceTotale" name="surfaceTotale" placeholder="Surface totale">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="surfaceDemande" class="col-sm-6 control-label">Surface Demandé</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="surfaceDemande" name="surfaceDemande" placeholder="Surface Demandé">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="surfaceBatie" class="col-sm-6 control-label">Surface batie</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="surfaceBatie" name="surfaceBatie" placeholder="Surface batie">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="surfacePlancher" class="col-sm-6 control-label">surface plancher</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="surfacePlancher" name="surfacePlancher" placeholder="surface plancher">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="titreFoncier" class="col-sm-6 control-label">Titre foncier</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="titreFoncier" name="titreFoncier" placeholder="Titre foncier">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nbrPiecesHabitables" class="col-sm-6 control-label">nombre de pieces habitables</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nbrPiecesHabitables" name="nbrPiecesHabitables" placeholder="nombre de pieces habitables">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nbrLogement" class="col-sm-6 control-label">nombre de logement</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nbrLogement" name="nbrLogement" placeholder="nombre de logement">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cos" class="col-sm-6 control-label">COS</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="cos" name="cos" placeholder="COS">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ces" class="col-sm-6 control-label">CES</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="ces" name="ces" placeholder="CES">
                        </div>
                    </div>


                    

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default"> Suivant -></button>
                        </div>
                    </div>

                </form>


            
                </div>
            </div>
        </div>
</div>

        <table class="col-sm-10 table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Projet</th>
                <th scope="col">Client</th>
                <th scope="col">Nombre de documents</th>
                <th scope="col">Paiment</th>
                <th scope="col">Modifier</th>
                </tr>
            </thead>
            <tbody>
            <tr v-for="p in Projects">
                <th scope="col">@{{p.id}}</th>
                <th scope="col">@{{p.nomProjet}}</th>
                <td scope="col">@{{p.idClient}}</td>
                <td scope="col">Nombre de documents</td>
                <td scope="col">Paiment</td>
                <td scope="col">Modifier</td>
                </tr>
                
            </tbody>
        </table>
    </div>    

    
@endsection

@section('script')

<script>

    new Vue({
        el:'#projet',
        data:{
            Projects:[]
        },
        mounted: function () {
            this.getProject();
        },
        methods:{
            clientSubmit(){
                let clientForm = document.getElementById('clientForm');
                let formData = new FormData(clientForm);
                console.log(formData);
                this.$http.post('/Client', formData).then( (data) => 
                    { 
                        console.log(data);
                        $("#clientForm").addClass("none"); 
                        $("#idClientP").val(data.body.id); 
                        $("#projetForm").removeClass("none");

                    });
            },

            projetSubmit(){
                let projetForm = document.getElementById('projetForm');
                let formData= new FormData(projetForm);
                console.log(formData);
                this.$http.post('/Projet', formData).then( (data) => 
                    { 
                        console.log(data);

                    });
            },
            getProject(){
                
                this.$http.get('/Projet').then( (data) => 
                    { 
                        
                        this.Projects=data.data;

                    });

                
            }
        }

    })
    </script>

@endsection

