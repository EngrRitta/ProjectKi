module.exports = {
    getHomePage: (req, res) => {
        let query = "SELECT * FROM `parts` ORDER BY id ASC"; // query database to get all the parts

        // execute query
        db.query(query, (err, result) => {
            if (err) {
                res.redirect('/');
            }
            res.render('index.ejs', {
                title: "Project Ki | View Parts"
                ,parts: result
            });
        });
    },
};
