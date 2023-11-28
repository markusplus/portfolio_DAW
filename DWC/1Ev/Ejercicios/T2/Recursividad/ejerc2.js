const recursiveIncludes = function(array, el) {
    // return array.length>0?
    //             array.shift()!==el?
    //             recursiveIncludes(array,el):true:
    //         false

    if(array.length > 0) {
        if(array.shift() !== el) {
            return recursiveIncludes(array, el);
        }
        else {
            return true;
        }
    }
    else {
        return false;
    }
}
arr = [1,2,3];
console.log(recursiveIncludes(arr, 3));
