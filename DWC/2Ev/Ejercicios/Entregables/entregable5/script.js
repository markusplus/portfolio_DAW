var Dataframe = dfjs.DataFrame;
promesa = Dataframe.fromCSV("https://raw.githubusercontent.com/plotly/datasets/master/iris.csv")
.then(df => {
    const df2 = df.cast("SepalLength", parseFloat)
                .cast("SepalWidth", parseFloat)
                .cast("PetalLength", parseFloat)
                .cast("PetalWidth", parseFloat)
                .cast("Name", toString);
    
    const mediaSepalLength = df2.groupBy("Name")
    .aggregate(group => group.stat.mean("SepalLength")).rename("mean_SepalLength");
    const mediaSepalWidth = df2.groupBy("Name")
    .aggregate(group => group.stat.mean("SepalWidth")).rename("mean_Species");
    const mediaPetalLength = df2.groupBy("Name")
    .aggregate(group => group.stat.mean("PetalLength")).rename("mean_Species");
    const mediaPetalWidth = df2.groupBy("Name")
    .aggregate(group => group.stat.mean("PetalWidth")).rename("mean_Species");
})
.catch(err => window.alert(err));
