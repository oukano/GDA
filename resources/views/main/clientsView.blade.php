@extends('../layouts.app')

@section('style')
<!-- <link href="{{ asset('css/projet.css') }}" rel="stylesheet"> -->

@endsection


@section('content')

<div id="clients">
	<button type="button" class="btn btn-primary btn-lg add-item-big" v-on:click="begin()" data-toggle="modal" data-target=".bd-create-modal-lg">Nouveau Client</button>
	

	<div class="col-12 modal fade bd-create-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					 <div class="col-12  modal-content">

					 <div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						  </button>
					 </div>

					

					 
					 <form id="clientForm" class=" row form-horizontal" method="POST" v-on:submit.prevent="clientSubmit">
						  @csrf

						  <div class="col-sm-6" >
						  <div class="form-group">
						  <label for="nom" class="col-sm-6 control-label">Nom</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
						  </div>
						  </div>

						  
						  <!-- <div class="form-group">
						  <label for="nomAr" class="col-sm-6 control-label">الاسم</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="nomAr" name="nomAr" placeholder="الاسم">
						  </div>
						  </div> -->

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

					 


				
					 </div>
				</div>
	</div>

    <table id="dataTable" class="col-sm-10 table table-striped">
				<thead>
					 <tr>
					 <th scope="col">client</th>
					 <th scope="col">Projet</th>
					 <th scope="col">honoraire</th>
					 <th scope="col">tel</th>
					 </tr>
				</thead>
				<tbody>
				
				<tr v-for="c in clients" >
				<!-- <tr v-for="p in Projects" >	  -->	
					 <th scope="col" v-on:click.prevent="go(c.id)">@{{c.nom}} @{{c.prenom}} </th>
					 <th scope="col" v-on:click.prevent="go(c.id)">@{{c.nomProjet}}</th>
					 <td scope="col" v-on:click.prevent="go(c.id)">@{{c.honoraire}} Dh</td>
					 <td scope="col" v-on:click.prevent="go(c.id)">@{{c.tel1}}/@{{c.tel2}}</td>
										
				</tr>
				
					 
				</tbody>
    </table>

</div>

@endsection




@section('script')

<script>

new Vue({
     el:'#clients',
     data:{
         clients,

     },
     mounted:function(){
        this.getClients()

     },
     methods:{

         getClients(){
            this.$http.get('/apiClient').then( (data) => 
						  { 
								
								this.clients=data.data;
								// console.log(data.data);                                
								
								setTimeout( ()=>{ this.data() } ,100);

						  });
         },
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
								this.reset("#clientForm");
								$(".close").click();
								done();

						  });
				},
         data(){

           $('#dataTable').DataTable({
			retrieve: true,
			"language": {
				"lengthMenu": "Afficher _MENU_ Par page",
				"zeroRecords": "Aucun enregistrement disponible",
				"info": "Page _PAGE_/_PAGES_",
				"infoEmpty": " ",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"sSearch": '<i class="fa fa-search" aria-hidden="true"></i>',
				"oPaginate": {
					"sNext": "Suivant",
					"sPrevious": "Précédant"
				}
			}
		});

        },
		begin(){
			this.reset("#clientForm");
			$("#clientForm").removeClass("none");	
		},
		reset(form){
					$(form).find('input:text, input:password, select, textarea').val('');
							$(form).find('input:radio, input:checkbox').prop('checked', false);
				},
        go(id){

            window.location.href = "/clients/"+id;

        }

     }

});

 $(".sidebar-nav li").removeClass("active")	
	 setTimeout(() => {
		
		$(".client").addClass("active");	
	 },500)
</script>

@endsection
