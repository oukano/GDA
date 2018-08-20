@extends('../layouts.app')

@section('style')
<style>


#topH{
    position: absolute;
    top:5px;
    font-size: 30px;
}

</style>


@endsection


@section('content')

<div id="client">

    <div id="topH" class=" row col-12">
        <span  class="col-12 projetName" data-toggle="modal" data-target=".bd-project-modal-lg" >@{{nomClient}}</span>
    </div>
    <input type="hidden" id="clientId" value={{$id}} >
    
    <div id=""  >

         <form id="clientForm" class=" row form-horizontal" method="POST" v-on:submit.prevent="clientSubmit">
						  @csrf

						  <div class="col-sm-6" >
						  <div class="form-group">
						  <label for="nom" class="col-sm-6 control-label">Nom</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="nom" v-model="client.nom" name="nom" placeholder="Nom">
						  </div>
						  </div>

						  
						  <!-- <div class="form-group">
						  <label for="nomAr" class="col-sm-6 control-label">الاسم</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="nomAr" v-model="client" name="nomAr" placeholder="الاسم">
						  </div>
						  </div> -->

						  <div class="form-group">
						  <label for="prenom" class="col-sm-6 control-label">Prenom</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="prenom" v-model="client.prenom" name="prenom" placeholder="Prenom">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="adresse" class="col-sm-6 control-label">Adresse</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="adresse" v-model="client.adresse" name="adresse" placeholder="Adresse">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="cin" class="col-sm-6 control-label">CIN</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="cin" v-model="client.cin" name="cin" placeholder="CIN">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="tel1" class="col-sm-6 control-label">Tel1</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="tel1" v-model="client.tel1" name="tel1" placeholder="Tel1">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="tel2" class="col-sm-6 control-label">Tel2</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="tel2" v-model="client.tel2" name="tel2" placeholder="Tel2">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="nationalite" class="col-sm-6 control-label">Nationalite</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="nationalite" v-model="client.nationalite" name="nationalite" placeholder="Nationalite">
						  </div>
						  </div>

						  </div>

						  <div class="col-sm-6" >

						  <div class="form-group">
						  <label for="profession" class="col-sm-6 control-label">Profession</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="profession" v-model="client.profession" name="profession" placeholder="Profession">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="dateNaissance" class="col-sm-6 control-label">Date de Naissance</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="dateNaissance" v-model="client.dateNaissance" name="dateNaissance" placeholder="Date de naissance">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="lieuNaissance" class="col-sm-6 control-label">lieu de Naissance</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="lieuNaissance" v-model="client.lieuNaissance" name="lieuNaissance" placeholder="lieu de naissance">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="nomPere" class="col-sm-6 control-label">Nom de pere</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="nomPere" v-model="client.nomPere" name="nomPere" placeholder="Nom de pere">
						  </div>
						  </div>


						  <div class="form-group">
						  <label for="nomMere" class="col-sm-6 control-label">Nom de mere</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="nomMere" v-model="client.nomMere" name="nomMere" placeholder="Nom de mere">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="representantLegal" class="col-sm-6 control-label">Representant legal</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="representantLegal" v-model="client.representantLegal" name="representantLegal" placeholder="Representant legal">
						  </div>
						  </div>

						  <div class="form-group">
						  <label for="natureJuridique" class="col-sm-6 control-label">Nature Juridique</label>
						  <div class="col-sm-10">
								<input type="text" class="form-control" id="natureJuridique" v-model="client.natureJuridique" name="natureJuridique" placeholder="Nature Juridique">
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
    

@endsection

@section('script')
<script>
new Vue({

    el:'#client',
    data:{
        id: $("#clientId").val(),
        client,
        nomClient:" ",

    },
    mounted: function(){
        this.getClient()

    },
    methods:{

        getClient(){
            this.$http.get('/apiClient/'+this.id).then( (data) => 
						  { 
                              this.client=data.data;
                              this.nomClient= this.client.nom + " " + this.client.prenom
                          }
            );          
        },
        

        
    }
});

</script>



@endsection


