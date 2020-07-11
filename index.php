<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matumizi Tracker</title>
</head>
<body>
<div id="app">
    <h1>Matumizi Tracker</h1>

    <div>
        <input style="display:block" type="number" v-model="kiasi" id="" placeholder="Kiasi">
        <textarea style="display:block" v-model="description" name="" id="" cols="30" rows="3"></textarea>
        <button v-if="!editMode" @click="addMatumizi()" >Add</button>
        <button v-else @click="updateMatumizi()" >Update</button>
    </div>

    <hr>

    <div v-for="tumizi in matumizi">
        <h4>Tsh. {{tumizi.kiasi}}</h4>
        <p>{{tumizi.description}}</p>
        <button @click="editTumizi(tumizi)">Edit</button>
        <button @click="deleteTumizi(tumizi)">Delete</button>
    </div>
</div>

<script src="vue.js"></script>

<script>
new Vue({
   el:"#app" ,
   data(){
      return {
          editMode:false,
          kiasi:'',
          description:'',
          matumizi:[],
          editedTumizi:null
      }  
   },
   methods:{
    addMatumizi(){
        let tumizi = {
            kiasi:this.kiasi,
            description:this.description,
        }
        this.matumizi.unshift(tumizi)
        this.kiasi = ''
        this.description = ''
    },
    editTumizi(tumizi){
        this.editedTumizi = tumizi
        this.editMode = true;
        this.kiasi = tumizi.kiasi
        this.description = tumizi.description
    },
    updateMatumizi(){
        let tumizi = {
            kiasi:this.kiasi,
            description:this.description,
        }
        this.matumizi[ this.matumizi.indexOf(this.editedTumizi)]=tumizi
        this.kiasi = ''
        this.description = ''
        this.editMode = false
    },
    deleteTumizi(tumizi){
        this.matumizi.splice(this.matumizi.indexOf(tumizi),2)
    }
   }
})
</script>
</body>
</html>