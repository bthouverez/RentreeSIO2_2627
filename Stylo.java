public class Stylo {
    private int id;
    private String couleur;
    private String marque;
    private boolean fonctionne;
    private int niveauEncre;

    public Stylo() {
        this.id = 42;
        this.couleur = "Orange";
        this.marque = "Parker";
        this.fonctionne = true;
        this.niveauEncre = 75;
    }

    
    public String getCouleur() { return this.couleur; }
    public void setCouleur(String c) { this.couleur = c; } 

    public String toString() { return this.id + " " + this.couleur; }
}