@extends('../layouts.app')

@section('style')
<link href="{{ asset('css/paiment.css') }}" rel="stylesheet">

@endsection


@section('content')

<div id="paiments">
<button type="button" class="btn btn-primary btn-lg  add-item-big" v-on:click="begin(2)" data-toggle="modal" data-target=".bd-create-modal-sm">Nouveau Paiement</button>	

<div class="col-12 modal fade bd-create-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					 <div class="col-12  modal-content">

					 <div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						  </button>
					 </div>

					 <table id="dataTable2" class="col-sm-10 table table-striped">
								<thead>
									<tr>
									<th scope="col">client</th>
									<th scope="col">projet</th>
									</tr>
								</thead>
								<tbody>
								
								<tr v-for="pr in projets" >
								<!-- <tr v-for="p in Projects" >	  -->	
									<th scope="col" v-on:click.prevent="selectC(pr.projet.id)">@{{pr.client.nom}} @{{pr.client.prenom}}</th>														
									<th scope="col" v-on:click.prevent="selectC(pr.projet.id)">@{{pr.projet.nomProjet}}</th>														
								</tr>
								
									
								</tbody>
					</table>
					

					 
					 <form id="paimentForm" class="none row form-horizontal" method="POST" v-on:submit.prevent="paimentSubmit">
						  @csrf

						 <button type="button" class="btn btn-primary btn-lg  add-item-big"  id="cache" v-on:click.self.prevent="typeP='ca'"> cache</button>
						 <button type="button" class="btn btn-primary btn-lg  add-item-big"  v-on:click.self.prevent="typeP='ch'"> cheque</button>
						  
						<div class="col-12" v-if="typeP=='ca'">
								<div  class="form-group hidden">
								<label for="idProjet" class="col-sm-6 control-label">id</label>
								<div class="col-sm-10">
										<input type="hidden" class="form-control" id="idProjet" v-model="id" name="idProjet" placeholder="Nom">
								</div>
								</div>
								

								<div class="form-group  hidden">
								<label for="checkNbr" class="col-sm-6 control-label">Numéro du chèque</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="checkNbr" value=" " name="checkNbr" placeholder="checkNbr" >
								</div>
								</div>

								<div class="form-group  hidden">
								<label for="type" class="col-sm-6 control-label">type</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="type" value="cache" name="type" placeholder="type" >
								</div>
								</div>


								<div class="form-group">
								<label for="montant" class="col-sm-6 control-label">Montant</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="montant" name="montant" placeholder="montant">
								</div>
								</div>

								<div class="form-group">
								<div class="col-sm-10">
										<input type="submit"  class="btn btn-success btn-block form-control" id="Submit"  >
								</div>
								</div>




						</div>
						<div class="col-12 " v-else>

								<div class="row">

								<div  class="form-group hidden">
								<label for="idProjet" class="col-sm-6 control-label">id</label>
								<div class="col-sm-10">
										<input type="hidden" class="form-control" id="idProjet" v-model="id" name="idProjet" placeholder="Nom">
								</div>
								</div>


								<div class="col-6 form-group">
								<label for="checkNbr" class="col-sm-6 control-label">Numéro du chèque</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="checkNbr" name="checkNbr" placeholder="checkNbr" >
								</div>
								</div>

								<div class="form-group  hidden">
								<label for="type" class="col-sm-6 control-label">type</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="type" value="cheque" name="type" placeholder="type">
								</div>
								</div>


								<div class="col-6 form-group">
								<label for="montant" class="col-sm-6 control-label">Montant</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="montant" name="montant" placeholder="montant">
								</div>
								</div>

								</div>

								<div class="form-group">
								<div class="col-sm-10">
										<input class="btn btn-success btn-block form-control" type="submit" id="Submit"  >
								</div>
								</div>

					  	</div>

						  


						  

					 </form>

					 


				
					 </div>
				</div>
	</div>


	<div class="col-12 modal fade bd-modify-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					 <div class="col-12  modal-content">

					 <div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						  </button>
					 </div>

					  <form id="paimentModify" class=" row form-horizontal" method="POST" v-on:submit.prevent="paimentPut">
						  @csrf

						 <button type="button" class="btn btn-primary btn-lg  add-item-big"  v-on:click.self.prevent="typeP='ca'"> cache</button>
						 <button type="button" class="btn btn-primary btn-lg  add-item-big" id="cache2" v-on:click.self.prevent="typeP='ch'"> cheque</button>
						  
						<div class="col-12" v-if="typeP=='ca'">

								<div  class="form-group hidden">
								<label for="idProjet" class="col-sm-6 control-label">id</label>
								<div class="col-sm-10">
										<input type="hidden" class="form-control" id="idProjetM" v-model="id" name="idProjet" placeholder="Nom">
								</div>
								</div>
								

								<div class="form-group  hidden">
								<label for="checkNbr" class="col-sm-6 control-label">Numéro du chèque</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="checkNbr" value=" " name="checkNbr" placeholder="checkNbr" >
								</div>
								</div>

								<div class="form-group  hidden">
								<label for="type" class="col-sm-6 control-label">type</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="type" value="cache" name="type" placeholder="type" >
								</div>
								</div>


								<div class="form-group">
								<label for="montant" class="col-sm-6 control-label">Montant</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="montant" name="montant" placeholder="montant">
								</div>
								</div>

								<div class="form-group col-sm-12">
								<div class="col-sm-10">
										<input type="submit" class="btn btn-success btn-block form-control" id="Submit"  >
								</div>
								</div>




						</div>
						<div class="col-12 row" v-else>


								<div  class="form-group hidden">
								<label for="idProjet" class="col-sm-6 control-label">id</label>
								<div class="col-sm-10">
										<input type="hidden" class="form-control" id="idProjetM" v-model="id" name="idProjet" placeholder="Nom">
								</div>
								</div>


								<div class="col-6 form-group">
								<label for="checkNbr" class="col-sm-6 control-label">Numéro du chèque</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="checkNbr" name="checkNbr" placeholder="checkNbr" >
								</div>
								</div>

								<div class="form-group  hidden">
								<label for="type" class="col-sm-6 control-label">type</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="type" value="cheque" name="type" placeholder="type">
								</div>
								</div>


								<div class="col-6 form-group">
								<label for="montant" class="col-sm-6 control-label">Montant</label>
								<div class="col-sm-10">
										<input type="text" class="form-control" id="montant" name="montant" placeholder="montant">
								</div>
								</div>

								<div class="form-group col-sm-12">
								<div class="col-sm-10">
										<input type="submit" class="form-control btn btn-success btn-block" id="Submit"  >
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
					 <th scope="col">Projet</th>
					 <th scope="col">Montant</th>
					 <th scope="col">type</th>
					 <th scope="col">Num de Cheque</th>
					 <th scope="col">date</th>
					 <th scope="col">Modifier</th>
					 </tr>
				</thead>
				<tbody>
				
				<tr v-for="p in paiments" >
				<!-- <tr v-for="p in Projects" >		 -->
					 <th scope="col" v-on:click.prevent="go(p.id)">@{{p.nomProjet}} </th>
					 <th scope="col" v-on:click.prevent="go(p.id)">@{{p.montant}}</th>
					 <th scope="col" v-on:click.prevent="go(p.id)">@{{p.type}}</th>
					 <th scope="col" v-on:click.prevent="go(p.id)">@{{p.checkNbr}}</th>
					 <td scope="col" v-on:click.prevent="go(p.id)">@{{p.created_at}}</td>
					 <td scope="col" ><button class="btn btn-primary btn-lg btn-block"  data-toggle="modal" data-target=".bd-modify-modal-lg" v-on:click="modify(p.idProjet,p.id)">Modifier</button></td>
										
				</tr>
				
					 
				</tbody>
    </table>

</div>

@endsection




@section('script')

<script>

new Vue({
     el:'#paiments',
     data:{
		 id:'',
		 idModify:'',
		projets:'',
		paiments,
		typeP:String,
     },
     mounted:function(){
        this.getPaiments()
		this.getProjects()
     },
     methods:{

         getPaiments(){
            this.$http.get('/apiPaiment').then( (data) => 
						  { 
								
								this.paiments=data.data;
								console.log(data.data);                                
								
								setTimeout( ()=>{ this.data() } ,1000);

						  });
         },
		 getProjects(){
					 
					 this.$http.get('/apiProjet').then( (data) => 
						  { 
								
								console.log(data.data);
								this.projets=data.data.listProjets;
								
								setTimeout( ()=>{ this.data() } ,1000);

						  });

					 
				},
				paimentSubmit(){
					 let paimentForm = document.getElementById('paimentForm');
					 let formData= new FormData(paimentForm);
					 console.log(formData);
					 this.$http.post('/apiPaiment', formData).then( (data) => 
						  { 
								this.getPaiments();
								console.log(data);
								$("#dataTable2").removeClass("none"); 
								this.reset("#clientForm");
								$("#paimentForm").addClass("none");
								this.reset("#paimentForm");
								$(".close").click();
								done();								
								


						  });
				},
				reset(form){
					$(form).find('input:text, input:password, select, textarea').val('');
        			$(form).find('input:radio, input:checkbox').prop('checked', false);
				},
				selectC(id){
					this.removewrapper(2);
					this.id=id;
					$("#paimentForm").removeClass("none");
					$("#dataTable2").addClass("none");
					$("#cache").click();

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

          $('#dataTable2').DataTable({
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
		modify(id,idM){
			this.idModify=idM;
			console.log(this.idModify);
			this.id=id;
			$("#idProjetM").val(id);
			console.log(id);
			
			$("#cache2").click();
		},
		paimentPut(){
			let paimentModify = document.getElementById('paimentModify');
                    let formData = new FormData(paimentModify);
                    console.log(formData);
                    var buffer = {};
					formData.forEach(function(value, key){
						buffer[key] = value;
					});
					var dataJson = JSON.stringify(buffer);
					console.log(dataJson);
					console.log("/apiPaiment/"+this.idModify);
				
					 this.$http.put('/apiPaiment/'+this.idModify, dataJson).then( (data) => 
						  { 
									this.getPaiments();		
									console.log(this.idModify);					  		
									$("#paimentModify").reset;
									$(".close").click();

						  });
		},
		begin(id){
			this.addwrapper(2);
			$("#paimentForm").addClass("none");
			$("#dataTable2").removeClass("none");

			this.reset("#paimentForm");

		},
        removewrapper(id){
        	$("#dataTable"+id+"_wrapper").addClass("none");
        },
		addwrapper(id){
        	$("#dataTable"+id+"_wrapper").removeClass("none");
        }

     }

});

 $(".sidebar-nav li").removeClass("active")	
	 setTimeout(() => {
		
		$(".paiment").addClass("active");	
	 },500)
</script>

@endsection
