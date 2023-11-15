const countWords = (text) => {
    const words = text.toLowerCase().split(' ');
    const wordCount = {};
    for (let i = 0; i < words.length; i++) {
        if (wordCount.hasOwnProperty(words[i])) {
            wordCount[words[i]]++;
        } else {
            wordCount[words[i]] = 1;
        }
    }
    return wordCount;
}
console.log(countWords("sescagat petat torcat"));