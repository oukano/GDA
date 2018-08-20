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

<div id="modele">

    <div id="topH" class=" row col-12">
        <span  class="col-12 projetName" data-toggle="modal" data-target=".bd-project-modal-lg" >@{{nomModele}}</span>
    </div>
    <input type="hidden" id="projectId" value={{$id}} >
    
    <div id="docContent"  >

	</div>



</div>
    

@endsection

@section('script')
<script>
new Vue({

    el:'#modele',
    data:{
        id: $("#projectId").val(),
        modele,
        nomModele:" cjzekcj",

    },
    mounted: function(){
        this.getContent()

    },
    methods:{

        getContent(){
            this.$http.get('/apiModele/'+this.id).then( (data) => 
						  { 
                              this.modele=data.data;
                              this.nomModele=this.modele.nom;
                              $("#docContent").html(this.modele.contenu);
                          }
            );          
        },
        

        
    }
});

</script>



@endsection


