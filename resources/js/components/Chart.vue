<script>
import { Bar } from "vue-chartjs";

export default {
    extends: Bar,
    props: ["statistics", "charttitle"],
    data() {
        return {
            chartdata: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ],
                datasets: [
                    {
                        data: [],
                        backgroundColor: [
                            
                        ],
                        borderColor: [
                           
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true,
                                callback: function (value) {
                                    if (value % 1 === 0) {
                                        return value;
                                    }
                                },
                            },
                        },
                    ],
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: "#373a36",
                    },
                },
            },
        };
    },

    mounted() {
        this.getStatistics();
        this.renderChart(this.chartdata, this.options);
    },

    methods: {
        getStatistics() {
            for (let i = 0; i < 12; i++) {
                this.chartdata["datasets"][0]["data"].push(0);
                this.chartdata["datasets"][0]["backgroundColor"].push('#d48166');
                this.chartdata["datasets"][0]["borderColor"].push('#373a36');

            }

            for (let k = 0; k < this.chartdata["labels"].length; k++) {
                for (let j = 0; j < this.statistics.length; j++) {
                    if (
                        this.chartdata["labels"][k] ==
                        this.statistics[j]["MONTHNAME(created_at)"]
                    ) {
                        this.chartdata["datasets"][0]["data"][k] =
                            this.statistics[j]["count(id)"];
                        this.statistics.splice(j, 1);
                    }
                }
            }
        },
    },
};
</script>

<style></style>
