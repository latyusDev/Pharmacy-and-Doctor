import './bootstrap';
const search = document.querySelector('.search');
const output = document.querySelector('.output');
const btn = document.querySelector('.btn');
console.log('hr')
let drugs = [];

const getSearch = async()=>{
    const url = 'http://127.0.0.1:8000/user/search';
    const response = await fetch(url);
    const data = await response.json();
    drugs = data;
    console.log(data)
}


search.addEventListener('keyup', async(e)=>{
    e.preventDefault();
    await getSearch();
    const value = drugs.filter((drug)=>{
        if(search.value==''){
            return ;
        }
        return drug.name.toLowerCase().startsWith(search.value) &&
               drug.quantity>0
    })
    if(value.length>0){
      const drugs =  value.map((drug)=> `<div>
               <p>${drug.pharmacy.name}</p>
               <p>${drug.name}</p>
               <a href='/user/${drug.id}/buy'> Buy now</a>
               </div>`
             ).join('')
      output.innerHTML = drugs;
    
    }else{
    output.innerHTML = search.value +' not found';

    }
   
})