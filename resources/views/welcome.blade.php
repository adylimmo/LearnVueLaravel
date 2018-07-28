<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div id="app" class="p-5">
        <input type="text" v-model="cari" placeholder="Cari berita berdasarkan judul" class="form-control mb-5">
        <div v-for="b in filterberita" class="mb-5">
            <div>
                <h2 class="alert alert-secondary">@{{b.judul}}</h2>
                <p class="text-justify">@{{b.isi}}</p>
                <p class="blockquote-footer text-right">@{{b.tanggal}}</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                cari: '',
                berita: <?php echo DB::table('isiberita')->get() ?>
            },
            computed:{
                filterberita: function(){
                    return this.berita.filter((b) => {
                        return b.judul.toLowerCase().match(this.cari.toLowerCase());
                    });
                }
            }
        })
    </script>
</body>
</html>