<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    /**
     * Return list of countries
     */
    public function countries(): JsonResponse
    {
        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola',
            'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan',
            'Bahrain', 'Bangladesh', 'Belarus', 'Belgium', 'Bolivia',
            'Bosnia and Herzegovina', 'Brazil', 'Bulgaria', 'Canada',
            'Chile', 'China', 'Colombia', 'Croatia', 'Cyprus',
            'Czech Republic', 'Denmark', 'Ecuador', 'Egypt', 'Ethiopia',
            'Finland', 'France', 'Georgia', 'Germany', 'Ghana', 'Greece',
            'Guatemala', 'Hungary', 'Iceland', 'India', 'Indonesia',
            'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Japan',
            'Jordan', 'Kazakhstan', 'Kenya', 'Kuwait', 'Lebanon',
            'Libya', 'Lithuania', 'Luxembourg', 'Malaysia', 'Maldives',
            'Mexico', 'Morocco', 'Myanmar', 'Nepal', 'Netherlands',
            'New Zealand', 'Nigeria', 'Norway', 'Oman', 'Pakistan',
            'Palestine', 'Peru', 'Philippines', 'Poland', 'Portugal',
            'Qatar', 'Romania', 'Russia', 'Saudi Arabia', 'Singapore',
            'Slovakia', 'South Africa', 'South Korea', 'Spain',
            'Sri Lanka', 'Sweden', 'Switzerland', 'Syria', 'Taiwan',
            'Thailand', 'Tunisia', 'Turkey', 'Ukraine',
            'United Arab Emirates', 'United Kingdom', 'United States',
            'Uruguay', 'Uzbekistan', 'Venezuela', 'Vietnam', 'Yemen',
        ];

        sort($countries);

        return response()->json([
            'error' => false,
            'data'  => $countries,
        ]);
    }

    /**
     * Return states for a given country
     */
    public function states(Request $request): JsonResponse
    {
        $country = $request->input('country');

        $statesData = [
            'India' => [
                'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar',
                'Chhattisgarh', 'Goa', 'Gujarat', 'Haryana',
                'Himachal Pradesh', 'Jharkhand', 'Karnataka', 'Kerala',
                'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya',
                'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 'Rajasthan',
                'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura',
                'Uttar Pradesh', 'Uttarakhand', 'West Bengal',
                'Delhi', 'Jammu and Kashmir', 'Ladakh',
                'Andaman and Nicobar Islands', 'Chandigarh',
                'Dadra and Nagar Haveli and Daman and Diu',
                'Lakshadweep', 'Puducherry',
            ],
            'United States' => [
                'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
                'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia',
                'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas',
                'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts',
                'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana',
                'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey',
                'New Mexico', 'New York', 'North Carolina', 'North Dakota',
                'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
                'South Carolina', 'South Dakota', 'Tennessee', 'Texas',
                'Utah', 'Vermont', 'Virginia', 'Washington',
                'West Virginia', 'Wisconsin', 'Wyoming',
            ],
            'United Kingdom' => [
                'England', 'Scotland', 'Wales', 'Northern Ireland',
            ],
            'Canada' => [
                'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick',
                'Newfoundland and Labrador', 'Northwest Territories',
                'Nova Scotia', 'Nunavut', 'Ontario', 'Prince Edward Island',
                'Quebec', 'Saskatchewan', 'Yukon',
            ],
            'Australia' => [
                'Australian Capital Territory', 'New South Wales',
                'Northern Territory', 'Queensland', 'South Australia',
                'Tasmania', 'Victoria', 'Western Australia',
            ],
            'Pakistan' => [
                'Balochistan', 'Khyber Pakhtunkhwa', 'Punjab', 'Sindh',
                'Azad Kashmir', 'Gilgit-Baltistan', 'Islamabad Capital Territory',
            ],
            'Bangladesh' => [
                'Barisal', 'Chittagong', 'Dhaka', 'Khulna',
                'Mymensingh', 'Rajshahi', 'Rangpur', 'Sylhet',
            ],
            'Nepal' => [
                'Bagmati', 'Gandaki', 'Karnali', 'Koshi',
                'Lumbini', 'Madhesh', 'Sudurpashchim',
            ],
            'Sri Lanka' => [
                'Central', 'Eastern', 'North Central', 'Northern',
                'North Western', 'Sabaragamuwa', 'Southern', 'Uva', 'Western',
            ],
            'Germany' => [
                'Baden-Württemberg', 'Bavaria', 'Berlin', 'Brandenburg',
                'Bremen', 'Hamburg', 'Hesse', 'Lower Saxony',
                'Mecklenburg-Vorpommern', 'North Rhine-Westphalia',
                'Rhineland-Palatinate', 'Saarland', 'Saxony',
                'Saxony-Anhalt', 'Schleswig-Holstein', 'Thuringia',
            ],
            'France' => [
                'Auvergne-Rhône-Alpes', 'Bourgogne-Franche-Comté', 'Bretagne',
                'Centre-Val de Loire', 'Corse', 'Grand Est',
                'Hauts-de-France', 'Île-de-France', 'Normandie',
                'Nouvelle-Aquitaine', 'Occitanie', 'Pays de la Loire',
                "Provence-Alpes-Côte d'Azur",
            ],
            'United Arab Emirates' => [
                'Abu Dhabi', 'Ajman', 'Dubai', 'Fujairah',
                'Ras Al Khaimah', 'Sharjah', 'Umm Al Quwain',
            ],
            'Saudi Arabia' => [
                'Al Bahah', 'Al Jawf', 'Al Madinah', 'Al Qassim',
                'Asir', 'Eastern Province', "Ha'il", 'Jazan',
                'Makkah', 'Najran', 'Riyadh', 'Tabuk',
            ],
        ];

        if (!$country || !isset($statesData[$country])) {
            return response()->json([
                'error' => false,
                'data'  => ['states' => []],
                'msg'   => 'No states found for this country',
            ]);
        }

        $states = array_map(fn($s) => ['name' => $s], $statesData[$country]);

        return response()->json([
            'error' => false,
            'data'  => ['states' => $states],
        ]);
    }

    /**
     * Return cities for a given country + state
     */
    public function cities(Request $request): JsonResponse
    {
        $country = $request->input('country');
        $state   = $request->input('state');

        $citiesData = [
            'India' => [
                'Madhya Pradesh'  => [
                    'Bhopal', 'Indore', 'Gwalior', 'Jabalpur', 'Ujjain',
                    'Sagar', 'Rewa', 'Satna', 'Dewas', 'Ratlam',
                    'Murwara', 'Singrauli', 'Burhanpur', 'Khandwa',
                    'Bhind', 'Chhindwara', 'Guna', 'Shivpuri', 'Vidisha',
                    'Damoh', 'Mandsaur', 'Khargone', 'Neemuch',
                    'Pithampur', 'Hoshangabad', 'Itarsi',
                ],
                'Maharashtra'     => [
                    'Mumbai', 'Pune', 'Nagpur', 'Nashik', 'Aurangabad',
                    'Solapur', 'Kolhapur', 'Amravati', 'Navi Mumbai',
                    'Thane', 'Kalyan', 'Vasai-Virar', 'Sangli', 'Jalgaon',
                ],
                'Delhi'           => [
                    'New Delhi', 'North Delhi', 'South Delhi', 'East Delhi',
                    'West Delhi', 'Central Delhi', 'Dwarka', 'Rohini',
                    'Saket', 'Lajpat Nagar', 'Karol Bagh',
                ],
                'Uttar Pradesh'   => [
                    'Lucknow', 'Kanpur', 'Agra', 'Varanasi', 'Prayagraj',
                    'Meerut', 'Noida', 'Ghaziabad', 'Bareilly', 'Aligarh',
                    'Moradabad', 'Saharanpur', 'Gorakhpur', 'Mathura',
                ],
                'Gujarat'         => [
                    'Ahmedabad', 'Surat', 'Vadodara', 'Rajkot', 'Bhavnagar',
                    'Jamnagar', 'Gandhinagar', 'Junagadh', 'Anand', 'Nadiad',
                ],
                'Rajasthan'       => [
                    'Jaipur', 'Jodhpur', 'Udaipur', 'Kota', 'Bikaner',
                    'Ajmer', 'Bhilwara', 'Alwar', 'Bharatpur', 'Sikar',
                ],
                'Karnataka'       => [
                    'Bangalore', 'Mysore', 'Hubli', 'Dharwad', 'Belgaum',
                    'Mangalore', 'Davanagere', 'Bellary', 'Shimoga',
                ],
                'Tamil Nadu'      => [
                    'Chennai', 'Coimbatore', 'Madurai', 'Tiruchirappalli',
                    'Salem', 'Tirunelveli', 'Vellore', 'Erode', 'Tiruppur',
                ],
                'West Bengal'     => [
                    'Kolkata', 'Howrah', 'Asansol', 'Siliguri', 'Durgapur',
                    'Bardhaman', 'Malda', 'Baharampur', 'Habra',
                ],
                'Punjab'          => [
                    'Ludhiana', 'Amritsar', 'Jalandhar', 'Patiala', 'Bathinda',
                    'Mohali', 'Pathankot', 'Hoshiarpur', 'Batala',
                ],
                'Haryana'         => [
                    'Gurugram', 'Faridabad', 'Panipat', 'Ambala', 'Yamunanagar',
                    'Rohtak', 'Hisar', 'Karnal', 'Sonipat', 'Panchkula',
                ],
                'Bihar'           => [
                    'Patna', 'Gaya', 'Bhagalpur', 'Muzaffarpur', 'Darbhanga',
                    'Purnia', 'Arrah', 'Begusarai', 'Katihar',
                ],
                'Telangana'       => [
                    'Hyderabad', 'Warangal', 'Nizamabad', 'Khammam',
                    'Karimnagar', 'Ramagundam', 'Secunderabad',
                ],
                'Kerala'          => [
                    'Thiruvananthapuram', 'Kochi', 'Kozhikode', 'Thrissur',
                    'Kollam', 'Palakkad', 'Alappuzha', 'Kannur',
                ],
                'Andhra Pradesh'  => [
                    'Visakhapatnam', 'Vijayawada', 'Guntur', 'Nellore',
                    'Kurnool', 'Kakinada', 'Tirupati', 'Rajahmundry',
                ],
                'Himachal Pradesh' => [
                    'Shimla', 'Manali', 'Dharamsala', 'Solan', 'Mandi',
                    'Baddi', 'Nahan', 'Kullu',
                ],
                'Uttarakhand'     => [
                    'Dehradun', 'Haridwar', 'Roorkee', 'Haldwani',
                    'Rudrapur', 'Kashipur', 'Rishikesh', 'Nainital',
                ],
                'Goa'             => [
                    'Panaji', 'Margao', 'Vasco da Gama', 'Mapusa',
                    'Ponda', 'Bicholim', 'Curchorem',
                ],
                'Assam'           => [
                    'Guwahati', 'Silchar', 'Dibrugarh', 'Jorhat',
                    'Nagaon', 'Tinsukia', 'Tezpur',
                ],
                'Jharkhand'       => [
                    'Ranchi', 'Jamshedpur', 'Dhanbad', 'Bokaro',
                    'Deoghar', 'Phusro', 'Hazaribagh',
                ],
                'Chhattisgarh'    => [
                    'Raipur', 'Bhilai', 'Bilaspur', 'Korba',
                    'Rajnandgaon', 'Jagdalpur', 'Raigarh',
                ],
                'Odisha'          => [
                    'Bhubaneswar', 'Cuttack', 'Rourkela', 'Berhampur',
                    'Sambalpur', 'Puri', 'Balasore',
                ],
            ],
            'United States' => [
                'California'  => ['Los Angeles', 'San Francisco', 'San Diego', 'San Jose', 'Sacramento', 'Fresno', 'Long Beach', 'Oakland'],
                'New York'    => ['New York City', 'Buffalo', 'Rochester', 'Yonkers', 'Syracuse', 'Albany', 'New Rochelle'],
                'Texas'       => ['Houston', 'San Antonio', 'Dallas', 'Austin', 'Fort Worth', 'El Paso', 'Arlington', 'Corpus Christi'],
                'Florida'     => ['Jacksonville', 'Miami', 'Tampa', 'Orlando', 'St. Petersburg', 'Hialeah', 'Tallahassee'],
                'Illinois'    => ['Chicago', 'Aurora', 'Naperville', 'Joliet', 'Rockford', 'Springfield', 'Elgin'],
            ],
            'United Kingdom' => [
                'England'          => ['London', 'Birmingham', 'Manchester', 'Liverpool', 'Leeds', 'Sheffield', 'Bristol', 'Leicester'],
                'Scotland'         => ['Edinburgh', 'Glasgow', 'Aberdeen', 'Dundee', 'Inverness', 'Perth', 'Stirling'],
                'Wales'            => ['Cardiff', 'Swansea', 'Newport', 'Bangor', 'St Davids'],
                'Northern Ireland' => ['Belfast', 'Derry', 'Lisburn', 'Newry', 'Armagh'],
            ],
            'Canada' => [
                'Ontario'          => ['Toronto', 'Ottawa', 'Mississauga', 'Brampton', 'Hamilton', 'London', 'Markham', 'Vaughan'],
                'British Columbia' => ['Vancouver', 'Surrey', 'Burnaby', 'Richmond', 'Kelowna', 'Abbotsford', 'Victoria'],
                'Alberta'          => ['Calgary', 'Edmonton', 'Red Deer', 'Lethbridge', 'St. Albert', 'Medicine Hat'],
                'Quebec'           => ['Montreal', 'Quebec City', 'Laval', 'Gatineau', 'Longueuil', 'Sherbrooke'],
            ],
            'Australia' => [
                'New South Wales'  => ['Sydney', 'Newcastle', 'Wollongong', 'Maitland', 'Albury', 'Canberra'],
                'Victoria'         => ['Melbourne', 'Geelong', 'Ballarat', 'Bendigo', 'Shepparton'],
                'Queensland'       => ['Brisbane', 'Gold Coast', 'Townsville', 'Cairns', 'Toowoomba', 'Rockhampton'],
                'Western Australia'=> ['Perth', 'Fremantle', 'Bunbury', 'Mandurah', 'Geraldton'],
            ],
            'United Arab Emirates' => [
                'Dubai'      => ['Dubai', 'Deira', 'Bur Dubai', 'Jumeirah', 'Al Quoz'],
                'Abu Dhabi'  => ['Abu Dhabi City', 'Al Ain', 'Khalifa City', 'Mussafah'],
                'Sharjah'    => ['Sharjah City', 'Khor Fakkan', 'Kalba'],
                'Ajman'      => ['Ajman City'],
                'Fujairah'   => ['Fujairah City', 'Dibba Al Fujairah'],
            ],
            'Pakistan' => [
                'Punjab'                    => ['Lahore', 'Faisalabad', 'Rawalpindi', 'Gujranwala', 'Multan', 'Sialkot', 'Bahawalpur', 'Sargodha'],
                'Sindh'                     => ['Karachi', 'Hyderabad', 'Sukkur', 'Larkana', 'Nawabshah', 'Mirpur Khas'],
                'Khyber Pakhtunkhwa'        => ['Peshawar', 'Mardan', 'Mingora', 'Kohat', 'Abbottabad', 'Dera Ismail Khan'],
                'Balochistan'               => ['Quetta', 'Turbat', 'Khuzdar', 'Hub', 'Chaman'],
                'Islamabad Capital Territory'=> ['Islamabad'],
            ],
        ];

        if (!$country || !$state || !isset($citiesData[$country][$state])) {
            return response()->json([
                'error' => false,
                'data'  => [],
                'msg'   => 'No cities found',
            ]);
        }

        return response()->json([
            'error' => false,
            'data'  => $citiesData[$country][$state],
        ]);
    }
}