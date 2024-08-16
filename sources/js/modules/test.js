const Test = (()=>{

    const TestConfig = ()=>{
        console.log('Ultima funcionalidad tests');
    }


    return {
        childsTest : function(){
            try { TestConfig(); } catch (error) { }
        }
    }

})();


const getChildsTest = ()=>{
    Test.childsTest();
}

export { getChildsTest }