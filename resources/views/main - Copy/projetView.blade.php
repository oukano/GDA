@extends('../layouts.app')

@section('style')
<link href="{{ asset('css/projet.css') }}" rel="stylesheet">

@endsection

@section('content')

<div id="projet"  >
    <div id="topH" class=" row col-12">
        <span  class="col-3 projetName" data-toggle="modal" data-target=".bd-project-modal-lg" >@{{nomProjet}}</span>
        <span  class="col-6 clientName" data-toggle="modal" data-target=".bd-client-modal-lg" >Client : @{{clientNom}}</span>
    </div>

    <input type="hidden" id="projectId" value={{$id}} >
    <button v-on:click="printDoc" >print</button>
    <button v-on:click="save" >save</button>

    <div class="row">
	<div contenteditable="true" id="docContent"  >

	</div>
        <div class=" rightBar" >
            <ul >
                <li v-for="m in modeles" v-on:click="getContent(m.id)"> @{{m.nom}}</li>
            </ul>

        </div>

    </div>

    <!------------------------------------- project Modal -------------------------------------------->

    <div class="col-12 modal fade bd-project-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
                     <div class="col-12  modal-content">

                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                     </div>

                    <form id="projet" class="row form-horizontal" method="POST" v-on:submit.prevent="projetSubmit">
                          @csrf
                          <div class="col-6">

                          <div class="form-group">
                                <label for="idClient" class="col-sm-6 control-label">Client</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="idClientP" v-model="Projet.client.nom +' '+ Projet.client.prenom " value="22" name="idClient" placeholder="ID du Client">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="nomProjet" class="col-sm-6 control-label">Nom du projet</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nomProjet" v-model="Projet.projet.nomProjet"   name="nomProjet" placeholder="Nom du projet">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="etat" class="col-sm-6 control-label">Etat</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="etat" v-model="Projet.projet.etat" name="etat" placeholder="Etat">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="prix" class="col-sm-6 control-label">Prix</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="prix" v-model="Projet.projet.prix" name="prix" placeholder="Prix">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="delaiRealisation" class="col-sm-6 control-label">Delai de Realisation</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="delaiRealisation" v-model="Projet.projet.delaiRealisation" name="delaiRealisation" placeholder="Delai de Realisation">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="type" class="col-sm-6 control-label">Type</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="type" v-model="Projet.projet.type" name="type" placeholder="Type">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="nature" class="col-sm-6 control-label">Nature</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nature" v-model="Projet.projet.nature" name="nature" placeholder="Nature">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="situationTerrain" class="col-sm-6 control-label">Situation du terrain</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="situationTerrain" v-model="Projet.projet.situationTerrain" name="situationTerrain" placeholder="Situation du terrain">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="commune" class="col-sm-6 control-label">Commune</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="commune" v-model="Projet.projet.commune" name="commune" placeholder="Commune">
                                </div>
                          </div>
                          </div>

                          <div class="col-6">
                          <div class="form-group">
                                <label for="surfaceTotale" class="col-sm-6 control-label">Surface totale</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="surfaceTotale" v-model="Projet.projet.surfaceTotale" name="surfaceTotale" placeholder="Surface totale">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="surfaceDemande" class="col-sm-6 control-label">Surface Demandé</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="surfaceDemande" v-model="Projet.projet.surfaceDemande"  name="surfaceDemande" placeholder="Surface Demandé">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="surfaceBatie" class="col-sm-6 control-label">Surface batie</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="surfaceBatie" v-model="Projet.projet.surfaceBatie" name="surfaceBatie" placeholder="Surface batie">
                                </div>
                          </div>


                          <div class="form-group">
                                <label for="surfacePlancher" class="col-sm-6 control-label">surface plancher</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="surfacePlancher" v-model="Projet.projet.surfacePlancher" name="surfacePlancher" placeholder="surface plancher">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="titreFoncier" class="col-sm-6 control-label">Titre foncier</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="titreFoncier" v-model="Projet.projet.titreFoncier" name="titreFoncier" placeholder="Titre foncier">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="nbrPiecesHabitables" class="col-sm-6 control-label">nombre de pieces habitables</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nbrPiecesHabitables"  v-model="Projet.projet.nbrPiecesHabitables" name="nbrPiecesHabitables" placeholder="nombre de pieces habitables">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="nbrLogement" class="col-sm-6 control-label">nombre de logement</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nbrLogement" v-model="Projet.projet.nbrLogement" name="nbrLogement" placeholder="nombre de logement">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="cos" class="col-sm-6 control-label">COS</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="cos" v-model="Projet.projet.cos" name="cos" placeholder="COS">
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="ces" class="col-sm-6 control-label">CES</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="ces" v-model="Projet.projet.ces" name="ces" placeholder="CES">
                                </div>
                          </div>


                          
                          </div>

                    </form>
                    
                    </div>
        </div>

    </div>

    <!-------------------------------------  ------------------------------------------------>

    <!----------------------------------- ClientModal --------------------------------------------  -->

    <div class="col-12 modal fade bd-client-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                         <div class="col-12  modal-content">

                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                        <form id="clientForm" class="row form-horizontal" method="POST" v-on:submit.prevent="clientSubmit">
                              @csrf

                              <div class="col-sm-6" >
                              <div class="form-group">
                              <label for="nom" class="col-sm-6 control-label">Nom</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.nom" id="nom" name="nom" placeholder="Nom">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="prenom" class="col-sm-6 control-label">Prenom</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control"  v-model="Projet.client.prenom" id="prenom" name="prenom" placeholder="Prenom">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="adresse" class="col-sm-6 control-label">Adresse</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.adresse" id="adresse" name="adresse" placeholder="Adresse">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="cin" class="col-sm-6 control-label">CIN</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.cin" id="cin" name="cin" placeholder="CIN">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="tel1" class="col-sm-6 control-label">Tel1</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.tel1" id="tel1" name="tel1" placeholder="Tel1">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="tel2" class="col-sm-6 control-label">Tel2</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.tel2" id="tel2" name="tel2" placeholder="Tel2">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="nationalite" class="col-sm-6 control-label">Nationalite</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.nationalite" id="nationalite" name="nationalite" placeholder="Nationalite">
                              </div>
                              </div>

                              </div>

                              <div class="col-sm-6" >

                              <div class="form-group">
                              <label for="profession" class="col-sm-6 control-label">Profession</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.profession" id="profession" name="profession" placeholder="Profession">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="dateNaissance" class="col-sm-6 control-label">Date de Naissance</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.dateNaissance" id="dateNaissance" name="dateNaissance" placeholder="Date de naissance">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="lieuNaissance" class="col-sm-6 control-label">lieu de Naissance</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.lieuNaissance" id="lieuNaissance" name="lieuNaissance" placeholder="lieu de naissance">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="nomPere" class="col-sm-6 control-label">Nom de pere</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.nomPere" id="nomPere" name="nomPere" placeholder="Nom de pere">
                              </div>
                              </div>


                              <div class="form-group">
                              <label for="nomMere" class="col-sm-6 control-label">Nom de mere</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.nomMere" id="nomMere" name="nomMere" placeholder="Nom de mere">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="representantLegal" class="col-sm-6 control-label">Representant legal</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.representantLegal" id="representantLegal" name="representantLegal" placeholder="Representant legal">
                              </div>
                              </div>

                              <div class="form-group">
                              <label for="natureJuridique" class="col-sm-6 control-label">Nature Juridique</label>
                              <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="Projet.client.natureJuridique" id="natureJuridique" name="natureJuridique" placeholder="Nature Juridique">
                              </div>
                              </div>


                              </div>

                         </form>

                     </div>

         </div>
    </div>

    <!-------------------------------------  ------------------------------------------------>
    
    <!-- document submit -->

        <form id="saveDoc" class="row form-horizontal" v-on:submit.prevent="save()" >
            @csrf
            <input type="text" name="titre" id="titre">
            <input type="text" name="contenu" id="contenu" >
            <input type="text" name="idProjet" id="idProjet">
            <input type="text" name="idModel" id="idModel">
            <input type="submit">
        </form>

    <!-- document submit -->


</div>


@endsection




@section('script')

<script>
    var vm = new Vue({
		  el:'#projet',
          data:{
            modeles:"",
            id:$("#projectId").val(),
            modifyId:"",
            Projet:[],
            titreFr:"",
            titreAr:"",
            contenuFr:"oklkj",
            contenuAr:"",
            idProjet:"",
            idModel:"",
            nomProjet:" ",
            clientNom:" ",
            content:"heyyy",
            langue:""

          },
          mounted:function(){
              this.getProject();
              this.getModele();
              
          },
          methods:{

            getProject(){
                this.$http.get('/apiProjet/'+this.id).then( (data) => 
						  { 
								
                                this.Projet=data.data;
                                console.log(data.data);
                                this.nomProjet=this.Projet.projet.nomProjet;
                                this.clientNom=this.Projet.client.nom +' ' + this.Projet.client.prenom

						  });
            },

            getModele(){
                this.$http.get('/apiModele/').then( (data) => 
						    { 
                                this.modeles=data.data;
                                console.log(data.data);

                            });
            },
            getContent(id){
                
                this.modifyId=this.id;
                this.langue=this.modeles[id-1].langue;
                console.log(this.langue);
                $.each( this.modeles , function( key, value ) {
					if(value.id==id){
                                    vm.content=value;
                                    console.log(vm.content);
					    $("#docContent").html(value.contenu);

                        $("#titre").val(value.nom);                        
                        $("#contenu").val(value.contenu);
                        $("#idProjet").val($("#projectId").val());
                        $("#idModel").val(value.id);

                        
                    }
				});



                        $.each( this.Projet.client , function( key, value ) {

                              $(".C"+key).text(value);
                                   
				});

				$.each( this.Projet.projet , function( key, value ) {
					$(".P"+key).text(value);
				});

				$.each( this.Projet.architecte , function( key, value ) {
					$(".A"+key).text(value);
				});
                        

				// $.each( this.Projet.client , function( key, value ) {
				// 	$("#C"+key).text(value);
				// });

				// $.each( this.Projet.projet , function( key, value ) {
				// 	$("#P"+key).text(value);
				// });

				// $.each( this.Projet.architecte , function( key, value ) {
				// 	$("#A"+key).text(value);
                        //       console.log("#A"+ key );
				// });
            },
            
            printDoc()
            {
                var mywindow = window.open('', 'PrintWindow', 'width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');

                mywindow.document.write($("#docContent").html());

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();
                mywindow.close();

                return true;
            },

            save()
            {

                            let docForm = document.getElementById('saveDoc');
                            let formData = new FormData(docForm);
                            console.log(formData);
                            this.$http.post('/apiDocument', formData).then( (data) => 
                                 { 
                                       console.log(this.content);
                                    //    console.log(this.content);
                                       
       
                                 });

                        

                        
                  

            }
          }
    });

$("body").on('DOMSubtreeModified', "#docContent", function(){
      $("#contenu").val($("#docContent").html());
      
});

</script>

@endsection
