const mapToString = (map) => {
    let str=''
    map.foreach((value, key) => { 
        str += '${key} => ${value}, ';
    })
    return '{${str.slice(0, -2)}}';
}