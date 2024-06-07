<?php
// Sample location list
$locationlist = [
    ['id' => 1, 'QrId' => 'QC01', 'TreeName' => 'Neem', 'lat' => '26.841025', 'long' => '75.848387'],
    ['id' => 2, 'QrId' => 'QC02', 'TreeName' => 'Neem', 'lat' => '26.841026', 'long' => '75.848388'],
    ['id' => 3, 'QrId' => 'QC03', 'TreeName' => 'Neem', 'lat' => '26.841027', 'long' => '75.848389'],
    ['id' => 4, 'QrId' => 'QC04', 'TreeName' => 'Neem', 'lat' => '26.841028', 'long' => '75.848380'],
    ['id' => 5, 'QrId' => 'QC05', 'TreeName' => 'Neem', 'lat' => '26.841029', 'long' => '75.848381'],
    ['id' => 6, 'QrId' => 'QC06', 'TreeName' => 'Neem', 'lat' => '26.841030', 'long' => '75.848382']
];

$QrcodeId = isset($_GET['QrcodeId']) ? $_GET['QrcodeId'] : 'QC01';
$treeLocation = array_filter($locationlist, function($location) use ($QrcodeId) {
    return $location['QrId'] == $QrcodeId;
});
$treeLocation = array_values($treeLocation)[0];

// Sample data for various information
$similarTreesCount = 289;
$totalGeoTagged = 1200;
$approxAgeOfTree = 20;
$treeName='Neem';
$scientificName = 'Azadirachta indica';
$family = 'Meliaceae';
$girth = '2.5 meters';
$height = '15 meters';
$age = '50 years';
$condition = 'Good';
$ownership = 'Public Park';
$location_lat='24.432';
$location_long='75.243';
$treeCanopy = '12 meters';
$flower = 'small, white, bisexual flowers';
$floweringSeason = 'All year round';
$fruitSeason = 'May to August';
$description = 'Azadirachta indica, commonly known as neem, margosa, nimtree or Indian lilac, is a tree in the mahogany family Meliaceae. It is one of two species in the genus Azadirachta. It is native to the Indian subcontinent and to parts of Southeast Asia, but is naturalized and grown around the world in tropical and subtropical areas.';

// Sample image URLs
$treeImageUrl = 'https://geoplanetsolution.com/Geotree/image/neem_tree.webp';
$leafImageUrl = 'https://geoplanetsolution.com/Geotree/image/neem_leaf.webp';
$fruitImageUrl = 'https://geoplanetsolution.com/Geotree/image/neem_fruit.webp';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Info Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <script src="L.Control.Geonames.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <div class="container">
        <div class="infoSection">
            <div class="card_1_2">
                <div class="similarTree">
                    <p class="header"><?php echo $similarTreesCount; ?>+</p>
                    <p class="subHeader">Similar Trees</p>
                </div>
                <div class="geoTagInfo">
                    <p class="subHeader">Total GeoTagged</p>
                    <p class="header"><?php echo $totalGeoTagged; ?>+</p>
                </div>
            </div>
            <div class="card_1_2">
                <div class="ageInfo">
                    <p class="header"><?php echo $approxAgeOfTree; ?>+</p>
                    <p class="subHeader">Approx Age of Tree</p>
                </div>
                <div class="treeNameInfo">
                    <div>
                        <p class="subHeader"><?php echo $treeName; ?> <i class="treeIcon">&#127794;</i></p>
                        <p class="scientificName"><?php echo $scientificName; ?></p>
                    </div>
                    <div class="treeIcon"></div>
                </div>
            </div>
            <div class="locationInfo">
                <p class="location">Location: <?php echo $location_lat; ?>, <?php echo $location_long; ?></p>
                <p class="location">Landmark: [Location Landmark Name], [City]</p>
            </div>
            <div class="mapSection">
                <div id="map"></div>
            </div>
        </div>
        <div class="infoSection">
            <div class="imageContainer">
                <img src="<?php echo $treeImageUrl; ?>" alt="Tree Image view" class="treeImage">
            </div>
            <div class="treeDetails">
                <div class="infoContainer">
                    <p class="title">Common Name:</p>
                    <p class="title"><?php echo $treeLocation['TreeName']; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Scientific Name:</p>
                    <p class="value"><?php echo $scientificName; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Family :</p>
                    <p class="value"><?php echo $family; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Girth:</p>
                    <p class="value"><?php echo $girth; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Height:</p>
                    <p class="value"><?php echo $height; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Age:</p>
                    <p class="value"><?php echo $age; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Condition:</p>
                    <p class="value"><?php echo $condition; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Ownership:</p>
                    <p class="value"><?php echo $ownership; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Location:</p>
                    <p class="value"><?php echo $location_lat; ?>,<?php echo $location_long; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Tree Canopy:</p>
                    <p class="value"><?php echo $treeCanopy; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Flower:</p>
                    <p class="value"><?php echo $flower; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Flowering season:</p>
                    <p class="value"><?php echo $floweringSeason; ?></p>
                </div>
                <div class="infoContainer">
                    <p class="label">Fruit season:</p>
                    <p class="value"><?php echo $fruitSeason; ?></p>
                </div>
                <div class="imageContainer">
                    <div class="treeImag">
                        <img src="<?php echo $leafImageUrl; ?>" alt="Tree Leaf" >
                        <img src="<?php echo $fruitImageUrl; ?>" alt="Tree Fruit" >
                    </div>
                </div>
                <p class="description">
                    <?php echo $description; ?>
                </p>
                <div class="btn"><button id="showMoreBtn">Show more...</button></div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var map = L.map('map').setView([<?php echo $location_lat; ?>, <?php echo $location_long; ?>], 15);

            var osm= L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            var googleSat=  L.tileLayer('https://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });
            
            
            // Add one of the layers to the map initially
            googleSat.addTo(map);
            var baseMaps = {
                "OSM": osm,
                "Google Sat": googleSat
            };

            L.marker([<?php echo $location_lat; ?>, <?php echo $location_long; ?>]).addTo(map)
                .bindPopup('<?php echo $treeLocation['TreeName']; ?> Location')
                .openPopup();

            const showMoreBtn = document.getElementById('showMoreBtn');
            const description = document.querySelector('.description');
            let showMore = false;

            showMoreBtn.addEventListener('click', () => {
                showMore = !showMore;
                description.style.display = showMore ? 'block' : 'none';
                showMoreBtn.textContent = showMore ? 'Show less...' : 'Show more...';
            });
        });
    </script>
</body>
</html>

