@extends('../layouts.app')

@section('style')
<link href="{{ asset('css/projets.css') }}" rel="stylesheet">


@endsection

@section('content')

	 <div id="projets">

			<button type="button" v-on:click="begin()" class="btn btn-primary btn-lg add-item-big" data-toggle="modal" data-target=".bd-create-modal-lg">Nouveau Projet</button>


			<!-- // -------------------------------create Modal -----------------------------------------  -->
			<div class="col-12 modal fade bd-create-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					 <div class="col-12  modal-content">

					 <div class="modal-header">
							<span  class="add" >add</span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					 </div>

					<table id="dataTable2" class="col-sm-10 table table-striped">
								<thead>
									<tr>
									<th scope="col">id</th>
									<th scope="col">client</th>
									<th scope="col">honoraire</th>
									<th scope="col">tel</th>
									</tr>
								</thead>
								<tbody>
								
								<tr v-for="c in clients" >
								<!-- <tr v-for="p in Projects" >	  -->	
									<th scope="col" v-on:click.prevent="selectC(c.id)">@{{c.id}} </th>
									<th scope="col" v-on:click.prevent="selectC(c.id)">@{{c.nom}} @{{c.prenom}} </th>
									<td scope="col" v-on:click.prevent="selectC(c.id)">@{{c.honoraire}} Dh</td>
									<td scope="col" v-on:click.prevent="selectC(c.id)">@{{c.tel1}}/@{{c.tel2}}</td>
														
								</tr>
								
									
								</tbody>
					</table>

					 
					 <form id="clientForm" class="none row form-horizontal" method="POST" v-on:submit.prevent="clientSubmit">
							@csrf

							<div class="col-sm-6">
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
								<label for="representantLegal" class="col-sm-6 control-label">Representant legal</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="representantLegal" name="representantLegal" placeholder="Representant legal">
								</div>
								</div>

								<div class="form-group">
								<label for="profession" class="col-sm-6 control-label">Profession</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="profession" name="profession" placeholder="Profession">
								</div>
								</div>

								<div class="form-group">
								<label for="natureJuridique" class="col-sm-6 control-label">Nature Juridique</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="natureJuridique" name="natureJuridique" placeholder="Nature Juridique">
								</div>
								</div>

								<div class="form-group">
								<label for="nationalite" class="col-sm-6 control-label">Nationalite</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nationalite" name="nationalite" placeholder="Nationalite">
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
								<label for="lieuNaissance" class="col-sm-6 control-label">lieu de Naissance</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="lieuNaissance" name="lieuNaissance" placeholder="lieu de naissance">
								</div>
								</div>

							</div>

							<div class="col-sm-6" >
								
								<div class="form-group">
								<label for="nomAr" class="col-sm-6 control-label">الاسم</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nomAr" name="nomAr" placeholder="الاسم">
								</div>
								</div>

								<div class="form-group">
								<label for="prenomAr" class="col-sm-6 control-label">النسب</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="prenomAr" name="prenomAr" placeholder="النسب">
								</div>
								</div>

								<div class="form-group">
								<label for="adresseAr" class="col-sm-6 control-label">العنوان</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="adresseAr" name="adresseAr" placeholder="العنوان">
								</div>
								</div>


								<div class="form-group">
								<label for="representantLegalAr" class="col-sm-6 control-label">الممتل الشرعي</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="representantLegalAr" name="representantLegalAr" placeholder="الممتل الشرعي">
								</div>
								</div>

								<div class="form-group">
								<label for="professionAr" class="col-sm-6 control-label">المهنة</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="professionAr" name="professionAr" placeholder="المهنة">
								</div>
								</div>

								<div class="form-group">
								<label for="natureJuridiqueAr" class="col-sm-6 control-label">الصفة القانونية</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="natureJuridiqueAr" name="natureJuridiqueAr" placeholder="الصفة القانونية">
								</div>
								</div>

								<div class="form-group">
								<label for="nationaliteAr" class="col-sm-6 control-label">الجنسية</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nationaliteAr" name="nationaliteAr" placeholder="الجنسية">
								</div>
								</div>

								<div class="form-group">
								<label for="nomPereAr" class="col-sm-6 control-label">اسم الاب</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nomPereAr" name="nomPereAr" placeholder="اسم الاب">
								</div>
								</div>

								<div class="form-group">
								<label for="nomMereAr" class="col-sm-6 control-label">اسم الام</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nomMereAr" name="nomMereAr" placeholder="اسم الام">
								</div>
								</div>

								<div class="form-group">
								<label for="dateNaissance" class="col-sm-6 control-label">Date de Naissance</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="Date de naissance">
								</div>
								</div>

								<div class="form-group">
								<label for="tel2" class="col-sm-6 control-label">Tel2</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="tel2" name="tel2" placeholder="Tel2">
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

								<div class="form-group hidden">
									<label for="idClient" class="col-sm-6 control-label">ID du Client</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="idClientP" value="22" name="idClient" placeholder="ID du Client">
									</div>
								</div>

								<div class="form-group hidden">
									<label for="idAdmin" class="col-sm-6 control-label">ID du Admin</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="idAdmin" v-model="idAdmin" value="1" name="idAdmin" placeholder="ID du Admin">
									</div>
								</div>

								<div class="form-group">
									<label for="nomProjet" class="col-sm-6 control-label">Nom du projet</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="nomProjet"  name="nomProjet" placeholder="Nom du projet">
									</div>
								</div>

								<div class="form-group">
									<label for="etat" class="col-sm-6 control-label">Etat</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="etat" name="etat" placeholder="Etat">
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

								<div class="form-group">
									<label for="prix" class="col-sm-6 control-label">Prix</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
									</div>
								</div>
								
								<div class="form-group">
									<label for="surfaceTotale" class="col-sm-6 control-label">Surface totale</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="surfaceTotale" name="surfaceTotale" placeholder="Surface totale">
									</div>
								</div>

								<div class="form-group">
									<label for="surfaceBatie" class="col-sm-6 control-label">Surface batie</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="surfaceBatie" name="surfaceBatie" placeholder="Surface batie">
									</div>
								</div>

								<div class="form-group">
									<label for="titreFoncier" class="col-sm-6 control-label">Titre foncier</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="titreFoncier" name="titreFoncier" placeholder="Titre foncier">
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

								
							</div>



							<div class="col-6">

								<div class="form-group">
									<label for="nomProjetAr" class="col-sm-6 control-label">اسم المشروع</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="nomProjetAr"  name="nomProjetAr" placeholder="اسم المشروع">
									</div>
								</div>

								<div class="form-group">
									<label for="etatAr" class="col-sm-6 control-label">الحالة</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="etatAr"  name="etatAr" placeholder="الحالة">
									</div>
								</div>

								<div class="form-group">
									<label for="typeAr" class="col-sm-6 control-label">النوع</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="typeAr"  name="typeAr" placeholder="النوع">
									</div>
								</div>

								<div class="form-group">
									<label for="natureAr" class="col-sm-6 control-label">الطبيعة</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="natureAr"  name="natureAr" placeholder="الطبيعة">
									</div>
								</div>

								<div class="form-group">
									<label for="situationTerrainAr" class="col-sm-6 control-label">الموقع</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="situationTerrainAr"  name="situationTerrainAr" placeholder="الموقع">
									</div>
								</div>

								 <div class="form-group">
									<label for="communeAr" class="col-sm-6 control-label">الجماعة</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="communeAr"  name="communeAr" placeholder="الجماعة">
									</div>
								</div>

								<div class="form-group">
									<label for="delaiRealisation" class="col-sm-6 control-label">Delai de Realisation</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="delaiRealisation" name="delaiRealisation" placeholder="Delai de Realisation">
									</div>
								</div>

								<div class="form-group">
									<label for="surfaceDemande" class="col-sm-6 control-label">Surface Demandé</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="surfaceDemande" name="surfaceDemande" placeholder="Surface Demandé">
									</div>
								</div>


								<div class="form-group">
									<label for="surfacePlancher" class="col-sm-6 control-label">surface plancher</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="surfacePlancher" name="surfacePlancher" placeholder="surface plancher">
									</div>
								</div>

								<div class="form-group">
									<label for="nbrPiecesHabitables" class="col-sm-6 control-label">nombre de pieces habitables</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="nbrPiecesHabitables" name="nbrPiecesHabitables" placeholder="nombre de pieces habitables">
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
							</div>

					 </form>


				
					 </div>
				</div>
			</div>







			<!-- // ---------------------------------Modify Modal ---------------------------------------------- -->
			<div class="col-12 modal fade bd-modify-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					 <div class="col-12  modal-content">

					 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					 </div>
					 
					 <form id="projetModify" class="row form-horizontal"  v-on:submit.prevent="projectPut(id)">
							@csrf
							<div class="col-6">

							<div class="form-group">
								<label for="idClient" class="col-sm-6 control-label">ID du Client</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="idClientP" model="idClient" value="22" name="idClient" placeholder="ID du Client">
								</div>
							</div>

							<div class="form-group">
								<label for="idAdmin" class="col-sm-6 control-label">ID du Admin</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="idAdmin" v-model="idAdmin" value="1" name="idAdmin" placeholder="ID du Admin">
								</div>
							</div>

							<div class="form-group">
								<label for="nomProjet" class="col-sm-6 control-label">Nom du projet</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="nomProjet" v-model="nomProjet" name="nomProjet" placeholder="Nom du projet">
								</div>
							</div>

							<div class="form-group">
								<label for="etat" class="col-sm-6 control-label">Etat</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="etat" v-model="etat"  name="etat" placeholder="Etat">
								</div>
							</div>

							<div class="form-group">
								<label for="prix" class="col-sm-6 control-label">Prix</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="prix" v-model="prix" name="prix" placeholder="Prix">
								</div>
							</div>

							<div class="form-group">
								<label for="delaiRealisation" class="col-sm-6 control-label">Delai de Realisation</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="delaiRealisation" v-model="delaiRealisation" name="delaiRealisation" placeholder="Delai de Realisation">
								</div>
							</div>

							<div class="form-group">
								<label for="type" class="col-sm-6 control-label">Type</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="type"  v-model="type" name="type" placeholder="Type">
								</div>
							</div>

							<div class="form-group">
								<label for="nature" class="col-sm-6 control-label">Nature</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="nature" v-model="nature" name="nature" placeholder="Nature">
								</div>
							</div>

							<div class="form-group">
								<label for="situationTerrain" class="col-sm-6 control-label">Situation du terrain</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="situationTerrain" v-model="situationTerrain" name="situationTerrain" placeholder="Situation du terrain">
								</div>
							</div>

							<div class="form-group">
								<label for="commune" class="col-sm-6 control-label">Commune</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="commune" v-model="commune" name="commune" placeholder="Commune">
								</div>
							</div>
							</div>

							<div class="col-6">
							<div class="form-group">
								<label for="surfaceTotale" class="col-sm-6 control-label">Surface totale</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="surfaceTotale"  v-model="surfaceTotale" name="surfaceTotale" placeholder="Surface totale">
								</div>
							</div>

							<div class="form-group">
								<label for="surfaceDemande" class="col-sm-6 control-label">Surface Demandé</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="surfaceDemande" v-model="surfaceDemande" name="surfaceDemande" placeholder="Surface Demandé">
								</div>
							</div>

							<div class="form-group">
								<label for="surfaceBatie" class="col-sm-6 control-label">Surface batie</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="surfaceBatie" v-model="surfaceBatie" name="surfaceBatie" placeholder="Surface batie">
								</div>
							</div>


							<div class="form-group">
								<label for="surfacePlancher" class="col-sm-6 control-label">surface plancher</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="surfacePlancher" v-model="surfacePlancher" name="surfacePlancher" placeholder="surface plancher">
								</div>
							</div>

							<div class="form-group">
								<label for="titreFoncier" class="col-sm-6 control-label">Titre foncier</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="titreFoncier" v-model="titreFoncier" name="titreFoncier" placeholder="Titre foncier">
								</div>
							</div>

							<div class="form-group">
								<label for="nbrPiecesHabitables" class="col-sm-6 control-label">nombre de pieces habitables</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="nbrPiecesHabitables" v-model="nbrPiecesHabitables" name="nbrPiecesHabitables" placeholder="nombre de pieces habitables">
								</div>
							</div>

							<div class="form-group">
								<label for="nbrLogement" class="col-sm-6 control-label">nombre de logement</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="nbrLogement" v-model="nbrLogement" name="nbrLogement" placeholder="nombre de logement">
								</div>
							</div>

							<div class="form-group">
								<label for="cos" class="col-sm-6 control-label">COS</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="cos" v-model="cos" name="cos" placeholder="COS">
								</div>
							</div>

							<div class="form-group">
								<label for="ces" class="col-sm-6 control-label">CES</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="ces" v-model="ces"  name="ces" placeholder="CES">
								</div>
							</div>


							

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default"> Suivant -></button>
								</div>
							</div>
							</div>

					 </form>


				
					 </div>
				</div>
			</div>
			

			

			
	

						<!-- ---------------------------------Result  Table -->

			<table id="dataTable" class="col-sm-10 table table-striped">
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
				
				<tr v-for="p in Projects" >
				<!-- <tr v-for="p in Projects" >		 -->
					 <th scope="col" v-on:click.prevent="go(p.projet.id)">@{{p.projet.id}} </th>
					 <th scope="col" v-on:click.prevent="go(p.projet.id)">@{{p.projet.nomProjet}}</th>
					 <td scope="col" v-on:click.prevent="go(p.projet.id)">@{{p.client.nom}} @{{p.client.prenom}}</td>
					 <td scope="col" v-on:click.prevent="go(p.projet.id)">@{{p.données.nbrDocuments}}</td>
					 <td scope="col" v-on:click.prevent="go(p.projet.id)">@{{p.données.honoraire}}</td>
					 <td scope="col"><button class="btn btn-primary btn-lg btn-block"  v-on:click.prevent="projectModify(p.projet.id)"  data-toggle="modal" data-target=".bd-modify-modal-lg">Modifier</button></td>
										
				</tr>
				
					 
				</tbody>
			</table>
	 </div>    

	 
@endsection

@section('script')

<script>

	 new Vue({
			el:'#projets',

			
			data:{
				Projects:[],
				nomProjet:"",
				id:"",
				idClient:"",
				idAdmin:"",
				nomProjet:"",
				etat:"",
				prix:"",
				delaiRealisation:"",
				type:"",
				nature:"",
				situationTerrain:"",
				commune:"",
				surfaceTotale:"",
				surfaceDemande:"",
				surfaceBatie:"",
				surfacePlancher:"",
				titreFoncier:"",
				nbrPiecesHabitables:"",
				nbrLogement:"",
				cos:"",
				ces:"",
				clients:""
			},
			mounted: function () {
				this.getProjects();
				this.getClients();
			},
			methods:{
				clientSubmit(){
					 let clientForm = document.getElementById('clientForm');
					 let formData = new FormData(clientForm);
					 console.log(formData);
					 this.$http.post('/apiClient', formData).then( (data) => 
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
					 this.$http.post('/apiProjet', formData).then( (data) => 
							{ 
								this.getProjects();
								console.log(data);
								$("#clientForm").removeClass("none"); 
								this.reset("#clientForm");
								$("#projetForm").addClass("none");
								this.reset("#projetForm");
								$(".close").click();


							});
				},
				getProjects(){
					 
					 this.$http.get('/apiProjet').then( (data) => 
							{ 
								
								console.log(data.data);
								this.Projects=data.data.listProjets;
								
								setTimeout( ()=>{ this.data() } ,1000);

							});

					 
				},
				getClients(){
					 
					 this.$http.get('/apiClient').then( (data) => 
							{ 
								
								console.log(data.data);
								this.clients=data.data;
								
								setTimeout( ()=>{ this.data() } ,1000);

							});

					 
				},
								projectPut(id){

										let projetForm = document.getElementById('projetModify');
										let formData = new FormData(projetForm);
										console.log(formData);
										var buffer = {};
					formData.forEach(function(value, key){
						buffer[key] = value;
					});
					var dataJson = JSON.stringify(buffer);
				
					 this.$http.put('/apiProjet/'+this.id, dataJson).then( (data) => 
							{ 
									this.getProjects();							  		
									$("#projetModify").reset;
									$(".close").click();

							});

					 
				},
				projectModify(id){


					 this.$http.get('/apiProjet/'+id).then( (data) => 
							{ 
								this.id=data.data.projet.id;
								this.idClient=data.data.client.id;
								this.idAdmin=data.data.projet.idAdmin;
								this.nomProjet=data.data.projet.nomProjet;
								this.etat=data.data.projet.etat;
								this.prix=data.data.projet.prix;
								this.delaiRealisation=data.data.projet.delaiRealisation;
								this.type=data.data.projet.type;
								this.nature=data.data.projet.nature;
								this.situationTerrain=data.data.projet.situationTerrain;
								this.commune=data.data.projet.commune;
								this.surfaceTotale=data.data.projet.surfaceTotale;
								this.surfaceDemande=data.data.projet.surfaceDemande;
								this.surfaceBatie=data.data.projet.surfaceBatie;
								this.surfacePlancher=data.data.projet.surfacePlancher;
								this.titreFoncier=data.data.projet.titreFoncier;
								this.nbrPiecesHabitables=data.data.projet.nbrPiecesHabitables;
								this.nbrLogement=data.data.projet.nbrLogement;
								this.cos=data.data.projet.cos;
								this.ces=data.data.projet.ces;
							console.log(data.data);


							});

				},
				selectC(id){
					$("#dataTable2").addClass("none");
					$("#projetForm").removeClass("none");
					$("#idClientP").val(id);
					console.log(id);


				},
				go(id){

					window.location.href = "/projets/"+id;

				},
				reset(form){
					$(form).find('input:text, input:password, select, textarea').val('');
							$(form).find('input:radio, input:checkbox').prop('checked', false);
				},
				begin(){
					$("#clientForm , #projetForm").addClass("none");
					$("#dataTable2").removeClass("none");

					this.reset("#clientForm");
					this.reset("#projetForm");

				},
				data(){

					$('#dataTable').DataTable();
					$('#dataTable2').DataTable();

				}
			}

	 })
		 $(".add").click(function(){ $("#dataTable2").addClass("none"); $("#clientForm").removeClass("none"); });
	 $(".sidebar-nav li").removeClass("active")	
	 setTimeout(() => {
		
		$(".projet").addClass("active");	
	 },500)


	 </script>

	
@endsection

