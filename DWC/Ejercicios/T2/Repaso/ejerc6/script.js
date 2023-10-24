setObj = document.getElementById("set");
mapObj = document.getElementById("map");

function tirarDados() {
    aleatoria = Math.floor(Math.random()*6)+1;
    set.add(aleatoria);
    map.set(aleatoria, map.has(aleatoria) ? map.get(aleatoria)+1 : 1);
    setObj.innerHTML = '{${[...set]}}';
    mapObj.innerHTML = mapToString(map);
}