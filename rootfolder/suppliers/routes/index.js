module.exports = {
    getHomePage: (req, res) => {
        let query = "SELECT * FROM `suppliers` ORDER BY id ASC";

        // execute query
        db.query(query, (err, result) => {
            if (err) {
                res.redirect('/');
            }
            res.render('index.ejs', {
                title: "Project Ki | View Suppliers"
                ,suppliers: result
            });
        });
    },
};
