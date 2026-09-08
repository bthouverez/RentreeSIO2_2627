public class Enfant {
    private int id;
    private String dateNaiss;
    private String numTel;
    private String nom;
    private String prenom;
    private double tauxHumidite;
    private int distanceAuSol;

    public Enfant() {
        this.id = 42;
        this.dateNaiss = "2002-02-03";
        this.numTel = "+33612365478";
        this.nom = "John";
        // this.setNom("John");  // C'est pareil !
        this.prenom = "Doe";
        this.tauxHumidite = 0.25;
        this.distanceAuSol = 75;
        System.out.println(this.nom);
    }

    public int getId() { return this.id; }
    public void setId(int i) { this.id = i; }
    public String getNom() { return this.nom; }
    public void setNom(String n) { this.nom = n; }



    public String toString() {
        return "id : " + this.id +
         "nom : " + this.nom +
         "prenom : " + this.prenom +
         "dateNaiss : " + this.dateNaiss +
         "tauxHumidite : " + this.tauxHumidite +
         "distanceAuSol : " + this.distanceAuSol +
         "numTel : " + this.numTel;
    }

}